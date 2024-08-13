<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    @livewireStyles
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
<div class="w-full">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

        <x-admin.left-sidebar />

        <div class="flex flex-col flex-1 overflow-hidden">

            <x-admin.header />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container px-6 py-8 mx-auto">
                    <h3 class="text-3xl font-medium text-gray-700">{{ __('Admin Dashboard') }}</h3>

                    <x-admin.hero />

                    <div class="mt-8">

                    </div>

                    {{-- Main block --}}
                    <div class="flex flex-col mt-8">
                        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div
                                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                <table class="min-w-full">
                                    <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Name</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Title</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Role</th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                    </tr>
                                    </thead>

                                    <tbody class="bg-white">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="">
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">John Doe
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">john@example.com</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">Software Engineer</div>
                                            <div class="text-sm leading-5 text-gray-500">Web dev</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            Owner</td>

                                        <td
                                            class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="">
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">John Doe
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">john@example.com</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">Software Engineer</div>
                                            <div class="text-sm leading-5 text-gray-500">Web dev</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            Owner</td>

                                        <td
                                            class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="">
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">John Doe
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">john@example.com</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">Software Engineer</div>
                                            <div class="text-sm leading-5 text-gray-500">Web dev</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            Owner</td>

                                        <td
                                            class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="">
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">John Doe
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">john@example.com</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">Software Engineer</div>
                                            <div class="text-sm leading-5 text-gray-500">Web dev</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            Owner</td>

                                        <td
                                            class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="">
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">John Doe
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">john@example.com</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">Software Engineer</div>
                                            <div class="text-sm leading-5 text-gray-500">Web dev</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            Owner</td>

                                        <td
                                            class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="">
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">John Doe
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">john@example.com</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">Software Engineer</div>
                                            <div class="text-sm leading-5 text-gray-500">Web dev</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            Owner</td>

                                        <td
                                            class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="">
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">John Doe
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">john@example.com</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">Software Engineer</div>
                                            <div class="text-sm leading-5 text-gray-500">Web dev</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            Owner</td>

                                        <td
                                            class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="">
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">John Doe
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">john@example.com</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">Software Engineer</div>
                                            <div class="text-sm leading-5 text-gray-500">Web dev</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            Owner</td>

                                        <td
                                            class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{--// Main block --}}

                    <x-admin.footer />
                </div>
            </main>
        </div>
    </div>
</div>
</body>
</html>
