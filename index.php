<?php
include('function.php');
if(isset($_POST["send"]))
{

    $name = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $numero = $_POST["numero"];

    $contactify = new Contactify();
    $contactify->connect();
    
    $contactify->insert($name, $prenom, $email, $numero);

    header('Location: index.php');

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactify</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src = "script.js"></script>
</head>
<body>

<section id ="contacts">
<div class="main-content">
        <div class="dashboard-header">
            <h2>List contacts</h2>
        </div>
<div class ="button-add flex justify-center">
<button id ="add-player"type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Your contact</button>
<input name ="search" type="text" placeholder="Search Contact">
<button class ="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  h-">Recherche</button>
</div>

<div id="crud" tabindex="-1" aria-hidden="true" class="modal-add flex justify-center overflow-y-auto overflow-x fixed  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add New contact
                </h3>
                <button id ="boutton-close"type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5"  action = "index.php" method = "POST">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nom</label>
                        <input type="text" name="nom" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Name Player" name="name" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">prénom</label>
                        <input type="text" name="prenom" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Insert Photo Url" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                        <input type="text" name="email" id="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Your position" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="numero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">numéro de téléphone</label>
                        <input type="number" name="numero" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Your nationality" required="">
                    </div>
                </div>
                <input type="submit" name="send"  class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" placeholder ="submit">
            </form>

        </div>
    </div>
</div> 



<table>
 

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                Name
                </th>
                <th scope="col" class="px-6 py-3">
                Last Name
                </th>
                <th scope="col" class="px-6 py-3">
                email
                </th>
                <th scope="col" class="px-6 py-3">
                Phonenumber
                </th>


            </tr>
        </thead>
        <tbody>
            <?php
// include('function.php');

require_once("function.php");
$contactify = new Contactify();

// Connect to the database
$contactify->connect();

// Fetch all contacts
$contacts = $contactify->fetch();


var_dump($contacts);
foreach ($contacts as $contact) {
    echo ' <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4">
                ' . $contact["nom"] . '
            </td>
            <td class="px-6 py-4">
                ' . $contact["prenom"] . '
            </td>
            <td class="px-6 py-4">
                ' . $contact["email"] . '
            </td>
            <td class="px-6 py-4">
                ' . htmlspecialchars($contact["numero_telephone"]) . '
            </td>
             <td class="flex gap-y-1	 px-6 py-4">
                   <a  id ="button_delete" name ="delete" class ="confirm_click focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" href ="delete.php?delete_id='.$contact["ID"].'" >Delete</a>
                    <a  id ="button_delete" name ="delete" class ="confirm_click focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" href ="update.php?update_id='.$contact["ID"].'" >Update</a>
                </td>
        </tr>';
}

?>
          
            </tr>
        </tbody>
    </table>
</div>

</table>

</section>
    <script>


const crud_modal = document.querySelector("#crud");
const add_player =document.querySelector("#add-player");
const close_modal = document.querySelector("#boutton-close");
console.log(close_modal);
crud_modal.style.display = "none";

close_modal.addEventListener("click",function(){
    crud_modal.style.display = "none";
})

add_player.addEventListener("click",function(){
    crud_modal.style.display = "block";

})

    </script>
</body>
</html>