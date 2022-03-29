<div>

    <div class="min-h-[720px] relative overflow-hidden flex bg-gradient-to-b from-blue-50 to-blue-100">
        <div class="z-10 flex-1 w-full max-w-lg py-8 bg-white md:py-16">
            <div class="w-52	 max-w-md px-4 mx-auto sm:px-6 md:px-8">

                @if (session()->has('message'))
                <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800 text-center">
                    {{ session('message') }}
                </div>
                @endif

                <p class="mt-1 text-base font-medium text-gray-500">
                    @if($editMode) Update @else Create @endif
                </p>

                <form class="mt-8 space-y-6 md:mt-12" action="">
                    <div class="space-y-2">
                        <label class="inline-block text-sm font-medium text-gray-700" for="name">Name</label>

                        <input class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600" id="name" type="text" wire:model.defer="name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror

                    </div>

                    <div class="space-y-2">
                        <label class="inline-block text-sm font-medium text-gray-700" for="surname">Surname</label>

                        <input class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600" id="surname" type="surname" wire:model.defer="surname">
                        @error('surname') <span class="error">{{ $message }}</span> @enderror

                    </div>

                    <button class="flex items-center justify-center w-full h-8 px-3 text-sm font-semibold tracking-tight text-white transition bg-blue-600 rounded-lg shadow hover:bg-blue-500 focus:bg-blue-700 focus:outline-none focus:ring-offset-2 focus:ring-offset-blue-700 focus:ring-2 focus:ring-white focus:ring-inset" type="button" @if($editMode) wire:click.prevent="update" @else wire:click.prevent="store" @endif>@if($editMode) Save Changes @else Create @endif</button>

                </form>

                <div class="w-4 mx-auto mt-4 border-t border-gray-300"></div>


            </div>

            <div class="w-full max-w-md px-4 mx-auto sm:px-6 md:px-8">

            </div>
        </div>




        <div class="p-8 bg-gray-100 w-full">
            <div class="-mx-8 overflow-x-auto">
                <div class="inline-block min-w-full px-4">
                    <div class="overflow-hidden bg-white shadow rounded-xl">
                        <table class="w-full text-left divide-y table-auto">
                            <thead>
                                <tr class="divide-x bg-gray-50">
                                    <th class="px-4 py-2 text-sm font-semibold text-gray-600">
                                        Name
                                    </th>

                                    <th class="px-4 py-2 text-sm font-semibold text-gray-600">
                                        Surname
                                    </th>

                                    <th class="px-4 py-2 text-sm font-semibold text-gray-600">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y whitespace-nowrap">
                                @foreach($infos as $info)
                                <tr class="divide-x">
                                    <td class="px-4 py-3">{{$info->name}}</td>

                                    <td class="px-4 py-3">{{$info->surname}}</td>

                                    <td class="px-4 py-3">



                                        <a wire:click="show({{$info->id}})"><i class="fas fa-eye cursor-pointer"></i></a>

                                        <a wire:click="edit({{$info->id}})"><i class="fas fa-edit cursor-pointer text-gray-500"></i></a>

                                        <a wire:click="delete({{$info->id}})"><i class="fas fa-trash-alt cursor-pointer text-gray-500"></i></a>

                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>