<div class="w-full relative mt-4 shadow-2xl rounded my-24 overflow-hidden" style="margin:0 auto;">
    <div class="grid grid-cols-12 bg-white ">
        <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
          <div class="px-4 pt-4  content-center">
            <form  method="POST" class="w-full" wire:submit.prevent="submitForm">
                <fieldset>
                    <legend>Add a Staff</legend>
                @csrf
                <div class="py-3">
                    @error('name')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <input wire:model="name" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="Name" name="name" value="{{ old('name') }}" />

                </div>
                <div class="py-3">
                    @error('email')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <input wire:model="email" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="email" placeholder="Email" name="email" value="{{ old('email') }}" />

                </div>
                <div class="py-3">
                    @error('position')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <input wire:model="position" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="position" placeholder="Position" name="position" value="{{ old('position') }}" />

                </div>
                <div class="py-3">
                    <label for="department_id">Department</label>
                    @error('department_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <select wire:model="department_id" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="Department" name="department_id" value="{{ old('department_id') }}" />
                    <option></option>
                    @foreach($dept as $dep)
                        <option value="{{ $dep->id }}">{{$dep->name}}</option>
                        @endforeach
                </select>
                </div>
                <div class="py-3">
                    <label for="line_manager">Line Manager</label>
                    @error('line_manager')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <select wire:model="line_manager" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="line_manager" name="line_manager" value="{{ old('line_manager') }}" />
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{$user->name}}</option>
                        @endforeach
                </select>
                </div>
                <div class="pt-3">
                    <button class="flex px-6 py-3 text-white bg-indigo-500 rounded-md hover:bg-indigo-600 hover:text-white focus:outline-none focus:shadow-outline focus:border-indigo-300" type="submit">
                        <span class="self-center float-left ml-3 text-base font-medium">Submit</span>
                    </button>
                </div>
                </fieldset>
            </form>
          </div>
        </div>


    </div>
</div>
