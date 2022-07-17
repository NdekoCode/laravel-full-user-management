<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Liste des utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">Users</h2>
                        </div>
                        <div class="my-2 flex flex-col sm:flex-row">
                            <div class="mb-1 flex flex-row sm:mb-0">
                                <div class="relative">
                                    <select
                                        class="block h-full w-full appearance-none rounded-l border border-gray-400 bg-white py-2 px-4 pr-8 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>20</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative">
                                    <select
                                        class="block h-full w-full appearance-none rounded-r border-t border-r border-b border-gray-400 bg-white py-2 px-4 pr-8 leading-tight text-gray-700 focus:border-l focus:border-r focus:border-gray-500 focus:bg-white focus:outline-none sm:rounded-r-none sm:border-r-0">
                                        <option>All</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="relative block">
                                <span class="absolute inset-y-0 left-0 flex h-full items-center pl-2">
                                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                        <path
                                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                        </path>
                                    </svg>
                                </span>
                                <input placeholder="Search"
                                    class="block w-full appearance-none rounded-r rounded-l border border-b border-gray-400 bg-white py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 focus:bg-white focus:text-gray-700 focus:placeholder-gray-600 focus:outline-none sm:rounded-l-none" />
                            </div>
                        </div>
                        <div class="-mx-4 overflow-x-auto px-4 py-4 sm:-mx-8 sm:px-8">
                            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                                User
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                                Full Name
                                            </th>

                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                                Email
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                                Role
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                                Created at
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($users as $user)
                                            <tr>
                                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                                    <div class="flex items-center">
                                                        <div class="h-10 w-10 flex-shrink-0">
                                                            <img class="h-full w-full rounded-full"
                                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                                                alt="{{ $user->fullname() }}" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                                    <p class="whitespace-no-wrap text-gray-900">
                                                        <a class="hover:underline"
                                                            href="{{ route('admin.users.show', $user->id) }}">{{ $user->fullname() }}</a>
                                                        @if ($user->id === Auth::user()->id)
                                                            <span
                                                                class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                                                <span aria-hidden
                                                                    class="absolute inset-0 rounded-full bg-green-200 opacity-50"></span>
                                                                <span class="relative">You</span>
                                                            </span>
                                                        @endif
                                                    </p>
                                                </td>

                                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                                    <p class="whitespace-no-wrap text-gray-900">
                                                        {{ $user->email }}
                                                    </p>
                                                </td>

                                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                                    <p class="whitespace-no-wrap text-gray-900">
                                                        <span class="m-1">
                                                            {{-- <span class="m-1">
                                                            {{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}
                                                        </span> --}}
                                                            @foreach ($user->roles as $role)
                                                                <span
                                                                    class="{{ $role->name === 'admin' || $role->name == 'super_admin' ? 'text-white ' : ' text-green-900 ' }} relative m-1 inline-block px-3 py-1 font-semibold leading-tight">
                                                                    <span aria-hidden
                                                                        class="{{ $role->name === 'admin' || $role->name == 'super_admin' ? ' bg-blue-600 ' : 'bg-green-200 ' }} absolute inset-0 rounded-full opacity-60"></span>
                                                                    <span class="relative">{{ $role->name }}</span>
                                                                </span>
                                                            @endforeach
                                                        </span>
                                                    </p>
                                                </td>
                                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                                    <p class="whitespace-no-wrap text-gray-900">
                                                        {{ $user->created_at->format('M Y') }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="flex items-center border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                                    @if (Auth::user()->isCapableEdit($user))
                                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                                            class="m-1 rounded-md border border-transparent bg-blue-600 p-2 text-white transition-all duration-200 hover:border-blue-600 hover:bg-transparent hover:text-blue-600">Editer</a>
                                                    @else
                                                        <a href="{{ route('admin.users.show', $user->id) }}"
                                                            class="m-1 rounded-md border border-transparent bg-blue-600 p-2 text-white transition-all duration-200 hover:border-blue-600 hover:bg-transparent hover:text-blue-600">View
                                                            Profile</a>
                                                    @endif
                                                    @if (Auth::user()->isCapable($user))
                                                        <form method="POST"
                                                            action="{{ route('admin.users.destroy', $user->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('voulez-vous vraiment supprimer cet utilisateur ?')"
                                                                class="m-1 rounded-md border border-transparent bg-red-600 p-2 text-white transition-all duration-200 hover:border-red-600 hover:bg-transparent hover:text-red-600">Delete</button>
                                                        </form>
                                                    @endif

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>Pas d'utilisateur dans la base de donnée</tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div
                                    class="xs:flex-row xs:justify-between flex flex-col items-center border-t bg-white px-5 py-5">

                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
