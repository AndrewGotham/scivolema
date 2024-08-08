<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreQuestionApiRequest;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\UserResource;
use App\Models\Question;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionApiController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
//        $this->authorize('viewAny', Question::class);

        return QuestionResource::collection(Question::with(['answers','user'])->latest()->paginate(3));
    }

    public function authUserQuestions(Request $request)
    {
        $this->authorize('create', Question::class);

        return QuestionResource::collection($request->user()->questions()->latest()->paginate(3));
    }

    public function questionsByUser(Request $request)
    {
//        $this->authorize('viewAny', Question::class);

        $user = User::find($request->user_id);
        return QuestionResource::collection($user->questions()->with(['answers','user'])->latest()->paginate(3));
    }

    public function questionsByTag(string $tag)
    {
//        $this->authorize('viewAny', Question::class);

        $questions = Question::where('tags', 'LIKE', '%'.$tag.'%')->with(['answers','user'])->latest()->paginate(3);
        return QuestionResource::collection($questions);
    }

    public function store(StoreQuestionApiRequest $request)
    {
        $this->authorize('create', Question::class);

        if($request->validated())
        {
            $data = $request->validated();
            $data['slug'] = Str::slug($request->title);
            $data['tags'] = $request->tags;
            $question = $request->user()->questions()->create($data);
            return QuestionResource::make($question)->additional([
                'message' => 'Question created successfully.'
            ]);
        }

        return request()->json([
            'error' => 'Unprocessable Entity'
        ]);
    }

    public function show(Question $question)
    {
//        $this->authorize('view', $question);

        if(!$question)
        {
            abort(404);
        }
        $question->increment('views');
        return QuestionResource::make($question->load(['answers','user']));
    }

    public function update(StoreQuestionApiRequest $request, Question $question)
    {
//        $this->authorize('update', $question);

        if($request->user()->cannot('update', $question))
        {
            abort(403);
        }

        if($request->validated())
        {
            $data = $request->validated();
            $data['slug'] = Str::slug($request->title);
            $data['tags'] = $request->tags;
            $question->update($data);
            return QuestionResource::make($question)->additional([
                'user' => UserResource::make($question->user),
                'message' => 'Question updated successfully.'
            ]);
        }

        return request()->json([
            'error' => 'Unprocessable Entity'
        ]);
    }

    public function destroy(Request $request, Question $question)
    {
        if($request->user()->cannot('delete', $question)) {
            return response()->json([
                'error' => 'Something is very wrong, please try again later'
            ]);
        }else {
            $question->delete();
            return response()->json([
                'questions' => QuestionResource::collection($request->user()->questions),
                'message' => 'Question deleted successfully'
            ]);
        }
    }

    public function voteUp(Request $request, Question $question)
    {
        $vote = Vote::whereHasMorph(
            'votable',
            [Question::class],
            function (Builder $query) use ($request, $question) {
                $query->where('votable_id', $question->id);
            }
        )->where('user_id', $request->user()->id)->first();

        if(isset($vote->upvote) && $vote->upvote == true)
        {
            return response()->json([
                'error' => 'You have already voted for this question.',
            ]);
        }

        if(isset($vote->upvote) && $vote->upvote == false)
        {
            $question->increment('score');
            $vote->delete();
            return response()->json([
                'error' => 'You have withdrawn your score successfully.',
            ]);
        }

        $question->increment('score');
        $vote = Vote::make([
            'user_id' => $request->user()->id,
            'upvote' => true,
        ]);
        $vote->votable()->associate($question)->save();

        return QuestionResource::make($question->load(['answers','user']))->additional([
            'message' => 'Vote added successfully.',
        ]);
    }

    public function voteDown(Request $request, Question $question)
    {
        $vote = Vote::whereHasMorph(
            'votable',
            [Question::class],
            function (Builder $query) use ($request, $question) {
                $query->where('votable_id', $question->id);
            }
        )->where('user_id', $request->user()->id)->first();

        if(isset($vote->upvote) && $vote->upvote == false)
        {
            return response()->json([
                'error' => 'You have already given a negative score to this question.',
            ]);
        }

        if(isset($vote->upvote) && $vote->upvote == true)
        {
            $question->decrement('score');
            $vote->delete();
            return response()->json([
                'error' => 'You have withdrawn your positive score from this question successfully.',
            ]);
        }

        $question->decrement('score');
        $vote = Vote::make([
            'user_id' => $request->user()->id,
            'upvote' => false,
        ]);
        $vote->votable()->associate($question)->save();

        return QuestionResource::make($question->load(['answers','user']))->additional([
            'message' => 'Negative vote added successfully.',
        ]);
    }
}
