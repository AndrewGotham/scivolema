<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreAnswerApiRequest;
use App\Http\Requests\Api\V1\UpdateAnswerApiRequest;
use App\Http\Resources\AnswerResource;
use App\Http\Resources\QuestionResource;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AnswerApiController
{
    use AuthorizesRequests;
    public function index()
    {

    }

    public function authUserAnswers(Request $request)
    {
        $this->authorize('create', Answer::class);

        return AnswerResource::collection($request->user()->answers()->latest()->paginate(3));
    }

    public function answersByUser(Request $request)
    {
//        $this->authorize('viewAny', Question::class);

        $user = User::find($request->user_id);
        return AnswerResource::collection($user->answers()->with(['question','user'])->latest()->paginate(3));
    }

    public function store(StoreAnswerApiRequest $request, Question $question)
    {
        if($request->validated())
        {
            $data = $request->validated();
            $data['question_id'] = $question->id;
            $request->user()->answers()->create($data);
            return QuestionResource::make($question->load(['user', 'answers']))->additional([
                'message' => 'Answer added successfully',
            ]);
        }

        return response()->json(['error' => "Huston, we've got a problem"], 401);
    }

    public function show(Answer $answer)
    {
        if(!$answer)
        {
            return response()->json(['error' => 'Answer not found'], 404);
        }

        return AnswerResource::make($answer->load('question'));
    }

    public function update(UpdateAnswerApiRequest $request, Question $question, Answer $answer)
    {
        if($request->user()->cannot('update', $answer))
        {
            return response()->json([
                'error' => 'Something is very wrong, please try again later'
            ], 403);
        }

        if($request->validated())
        {
            $data = $request->validated();
            $data['user_id'] = $request->user()->id;
            $data['question_id'] = $question->id;
            $answer->update($data);
            return QuestionResource::make($question->load(['user', 'answers']))->additional([
                'message' => 'Answer updated successfully',
            ]);
        }

        return response()->json(['error' => "Huston, we've got a problem"], 401);
    }

    public function destroy(Request $request, Question $question, Answer $answer)
    {
        if($request->user()->cannot('delete', $answer)) {
            return response()->json([
                'error' => 'Something is very wrong, please try again later'
            ]);
        } else {
            $answer->delete();
            return QuestionResource::make($question->load(['user', 'answers']))->additional([
                'message' => 'Answer deleted successfully',
            ]);
        }
    }

    public function voteUp(Request $request, Answer $answer)
    {
        $vote = Vote::whereHasMorph(
            'votable',
            [Answer::class],
            function (Builder $query) use ($request, $answer) {
                $query->where('votable_id', $answer->id);
            }
        )->where('user_id', $request->user()->id)->first();

        if(isset($vote->upvote))
        {
            if($vote->upvote == true)
            {
                return response()->json([
                    'error' => 'You have already voted for this answer.',
                ]);
            }

            if($vote->upvote == false)
            {
                $answer->increment('score');
                $vote->delete();
                return response()->json([
                    'error' => 'You have withdrawn your score successfully.',
                ]);
            }
        }

        $answer->increment('score');
        $vote = Vote::make([
            'user_id' => $request->user()->id,
            'question_id' => Question::find($answer->question_id),
            'upvote' => true,
        ]);
        $vote->votable()->associate($answer)->save();

        return QuestionResource::make(Question::find($answer->question_id)->load(['answers','user']))->additional([
            'message' => 'Vote added successfully.',
        ]);
    }

    public function voteDown(Request $request, Answer $answer)
    {
        $vote = Vote::whereHasMorph(
            'votable',
            [Answer::class],
            function (Builder $query) use ($request, $answer) {
                $query->where('votable_id', $answer->id);
            }
        )->where('user_id', $request->user()->id)->first();

        if(isset($vote->upvote))
        {
            if($vote->upvote == false)
            {
                return response()->json([
                    'error' => 'You have already given a negative score to this answer.',
                ]);
            }

            if($vote->upvote == true)
            {
                $answer->decrement('score');
                $vote->delete();
                return response()->json([
                    'error' => 'You have withdrawn your positive score from this answer successfully.',
                ]);
            }
        }

        $answer->decrement('score');
        $vote = Vote::make([
            'user_id' => $request->user()->id,
            'question_id' => Question::find($answer->question_id),
            'upvote' => false,
        ]);
        $vote->votable()->associate($answer)->save();

        return QuestionResource::make(Question::find($answer->question_id)->load(['answers','user']))->additional([
            'message' => 'Negative vote added successfully.',
        ]);
    }

    public function markAsBest(Request $request, Answer $answer)
    {
        if($request->user()->cannot('markAsBest', $answer)) {
            return response()->json([
                'error' => 'Something is very wrong, please try again later'
            ]);
        } else {
            $bestAnswer = Answer::where(['best_answer' => true, 'question_id' => $answer->question->id])->first();
            if(isset($bestAnswer) && $bestAnswer->id != $answer->id)
            {
                $bestAnswer->update([
                    'best_answer' => false,
                ]);
            }
            $answer->update([
                'best_answer' => true,
            ]);
            return QuestionResource::make($answer->question->load(['user', 'answers']))->additional([
                'message' => 'Answer marked as the best successfully.',
            ]);
        }
    }

}
