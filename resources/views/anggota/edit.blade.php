<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Anggota Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('anggota.update',$anggota->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700 @error('name') text-red-500 @enderror">Name Project</span>
                                <input type="text" name="name"
                                    class="block @error('name') border-red-500 bg-red-100 text-red-900 @enderror w-full mt-1 rounded-md"
                                    placeholder="" value="{{old('name',$anggota->name)}}" />
                            </label>
                            @error('name')
                            <div class="flex items-center text-sm text-red-600">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700 @error('keterangan') text-red-500 @enderror">Keterangan</span>
                                <textarea
                                    class="block @error('keterangan') border-red-500  bg-red-100 text-red-900 @enderror w-full mt-1 rounded-md"
                                    name="keterangan" rows="3">{{old('keterangan',$anggota->keterangan)}}</textarea>
                            </label>
                            @error('keterangan')
                            <div class="flex items-center text-sm text-red-600">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700 @error('status') text-red-500 @enderror">Status</span>
                                <textarea
                                    class="block @error('status') border-red-500  bg-red-100 text-red-900 @enderror w-full mt-1 rounded-md"
                                    name="status" rows="3">{{old('status',$anggota->status)}}</textarea>
                            </label>
                            @error('status')
                            <div class="flex items-center text-sm text-red-600">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="Update"
                            class="text-black bg-blue-600  rounded text-sm px-5 py-2.5">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>