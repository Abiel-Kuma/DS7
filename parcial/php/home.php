<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
     integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="./css/home.css">
    <title>BlogHome</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="#">Blog</a></div>
            <ul class="links">
                <li><a href="home.html">Nuevo Blog</a></li>
            </ul>
            
        
            <div class="toggle_btn">
            <i class="fa-solid fa-bars" style="color: #22e0a7;"></i>
        </div>         
        </div>

        <div class="dropdown_menu ">
            <li><a href="home.html">Inicio</a></li>
            <li><a href="Redes">Crear Blog</a></li>
            <li><a href="login.html" class="btn">Editar Blog</a></li>

        </div>

    </header>

    <main>
        <section id="hero">
            <h1>Bienvenidos</h1>

        </section>
    </main>

<script>
        const toggleBtn = document.querySelector('.toggle_btn')
        const toggleBtnIcon = document.querySelector('.toggle_btn i')
        const dropDownMenu = document.querySelector('.dropdown_menu')

        toggleBtn.onclick = function ()
        {
            dropDownMenu.classList.toggle('open')
            toggleBtnIcon.classList = isOpen
            ?'fa-solid fa-xmark'
            :'fa-solid fa-bars'
        }
    </script>   

<footer>
    <h2>&copy; 2023, Luigi Yau 8-977-714, Claudio Wilkey 8-991-627, 1LS132</h2>
</footer>


</body>
</html>