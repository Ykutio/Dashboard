<!--START LOGIN-->
<button onclick="document.getElementById('id01').style.display = 'block'" style="width:auto;">Login</button>

<div id="id01" class="modal">
    <form class="modal-content animate" action="{{route('authorization')}}" method="post">
        @csrf
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal">&times;</span>
            <img src="{{ asset("/uploads/avatar-image.png") }}" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="email"><b>E-mail</b></label>
            <input type="text" placeholder="Enter Username" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display = 'none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>
<!--END LOGIN-->