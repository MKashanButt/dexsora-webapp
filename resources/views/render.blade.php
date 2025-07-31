@php
    $lastSegment = collect(request()->segments())->last();
    $table = config('table');
    $sheets = config('sheets');
@endphp
<x-app-layout>
    <div class="w-[100%] h-full overflow-scroll">
        <table class="w-full divide-y divide-[#e3e3e0] mt-4">
            <thead class="bg-gray-200 select-none">
                <tr>
                    @foreach ($table[$lastSegment] as $header => $fields)
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            {{ ucwords($header) }}</th>
                    @endforeach
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-[#e3e3e0]">
                @foreach ($data as $item)
                    <tr>
                        @foreach ($table[$lastSegment] as $header => $fields)
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                @php
                                    $value = $item[$fields['name']] ?? null;
                                @endphp
                                @if ($fields['name'] === 'created_at')
                                    {{ $value->format('Y-m-d') }}
                                @elseif(is_null($value) || $value == '[]')
                                    <form method="POST"
                                        action="{{ route('update', ['data' => $item->id, 'field' => $fields['name']]) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <input type="{{ $fields['type'] }}"
                                            name="{{ in_array($fields['name'], ['document', 'pod']) ? $fields['name'] . '[]' : $fields['name'] }}"
                                            multiple class="border border-gray-300 px-2 py-1 text-xs rounded"
                                            placeholder="Enter {{ $fields['name'] }}">
                                        <button type="submit"
                                            class="ml-1 text-blue-500 hover:underline text-xs">Save</button>
                                    </form>
                                @elseif(in_array($fields['name'], ['document', 'pod']))
                                    <div class="flex gap-2">
                                        @foreach (json_decode($value) as $document)
                                            <div class="relative  flex" x-data="{ open: false }">
                                                <span @click="open=!open">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-file-icon lucide-file">
                                                        <path
                                                            d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                                    </svg>
                                                </span>
                                                <div class="absolute bottom-[-70px] p-2 border rounded-sm bg-white z-100"
                                                    x-show="open" x-cloak @click.away="open = false">
                                                    <p class="text-center">{{ basename($document) }} </p>
                                                    <div class="flex gap-2 mt-2">
                                                        <a href="{{ Storage::url($document) }}" target="__blank">
                                                            <span
                                                                class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-gray-500/10 ring-inset">View</span>
                                                        </a>
                                                        <form
                                                            action="{{ route('file.delete', ['data' => $item->id, 'field' => 'document']) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Delete this file?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="file"
                                                                value="{{ $document }}">
                                                            <button type="submit"
                                                                class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-red-600/10 ring-inset cursor-pointer">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{ $value }}
                                @endif
                            </td>
                        @endforeach
                        <td class="px-6 py-4 whitespace-nowrap text-xs">
                            <div x-data="{ open: false }" class="relative">
                                <x-secondary-button @click="open=!open">
                                    {{ __('Move To Sheet') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="w-5 h-5 inline-block ml-2 transition ease-in-out duration-150"
                                        :class="{ 'rotate-180': open }">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </x-secondary-button>
                                <div class="divide-gray-100 divide-y absolute mt-2 right-0 w-60 bg-white border border-gray-200 rounded-lg shadow-md"
                                    x-show="open" @click.away="open = false">
                                    @foreach ($sheets as $label => $name)
                                        @continue($label === $lastSegment)
                                        <div class="px-3 py-2 cursor-pointer hover:bg-gray-100">
                                            <a href="{{ route('move', ['data' => $item->id, 'status' => $label]) }}">
                                                <p
                                                    class="w-full flex items-center justify-between text-xs font-semibold uppercase tracking-widest">
                                                    {{ $name }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-5 h-5 inline-block">
                                                        <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                                                        <path
                                                            d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" />
                                                    </svg>
                                                </p>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
