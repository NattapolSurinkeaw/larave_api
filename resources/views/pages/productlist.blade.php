@extends('layouts.main')
@section('content')


<div class="m-10">
    <a href="/createproduct" class="p-4 bg-red-500 " >Create</a>
</div>
    
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $product->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $product->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->price }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->quantity }}
                </td>
                <td class="px-6 py-4">
                    <a href="/edit/{{$product->id}}" class="p-4 bg-orange-500 m-4 rounded text-white">Edit</a>
                    <button onClick="deleteProduct({{$product->id}})" class="p-4 bg-red-500 rounded text-white">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<script>
    function deleteProduct(userID) {
        axios
        .delete(`api/delete/${userID}`)
        .then(function (response) {
            console.log(response.data);
            location.reload();
        })
        .catch(function (error) {
            console.error(error);
        });
    }
</script>