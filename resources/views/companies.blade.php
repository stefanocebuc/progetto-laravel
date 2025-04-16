<x-layout>
    @foreach ($data as $company)
    <div>{{ $company->name }}</div>
    @endforeach
</x-layout>