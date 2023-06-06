@extends('layouts.main')
@section('content')

<div class="w-10/12 m-auto">
    <div>
        <h1 class="text-3xl text-center m-4 text-yellow-700 font-medium">Edit Product</h1>
    </div>
    <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
        <input type="text" value="{{$product->name}}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
    </div>
    <div>
        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
        <input type="text" value="{{$product->description}}" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
    </div>
    <div>
        <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
        <input type="text" value="{{$product->price}}" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
    </div>  
    <div>
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
        <input type="tel" value="{{$product->quantity}}" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
    </div>
    <div class="m-4 p-4 bg-red-400 w-16 rounded-lg">
        <button onClick="editProducts({{$product->id}})">Save</button>
    </div>
</div>

@endsection

<script>
    function editProducts(id) {
    const name = document.getElementById("name").value;
    const description = document.getElementById("description").value;
    const price = document.getElementById("price").value;
    const quantity = document.getElementById("quantity").value;

    if (!name || !description || !price || !quantity) {
        console.log("Please enter your data");
        return; // ออกจากฟังก์ชันเพื่อไม่ดำเนินการต่อ
    }

    const data = {
        name: name,
        description: description,
        price: price,
        quantity: quantity
    };

    axios
        .put(`/api/edit/${id}`, data) // ใช้พารามิเตอร์ id ที่รับมาจากพารามิเตอร์ของฟังก์ชัน
        .then(function (response) {
            console.log(response.data);
            window.location.href = "/"
        })
        .catch(function (error) {
            console.error(error);
        });
}

</script>

