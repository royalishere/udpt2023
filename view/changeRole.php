<!-- Role hiện tại: textinput disabled
    Role thay đổi: select menu (Questioner, Answerer, Evaluater)
    Button Apply -->

<h2 class="my-4 text-center">CHANGE ROLE</h2>
<div class="col-12 px-3">
    <form action="?action=changeRole" method="post">
        <div class="mb-3">
            <label for="current-role" class="form-label
            ">Current Role</label>
            <input type="text" class="form-control" id="current-role" name="current-role" value="<?php echo $_SESSION['user']['role'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="new-role" class="form-label">New Role</label>
            <select class="form-select" id="new-role" name="new-role" required>
                <option value="Questioner">Questioner</option>
                <option value="Answerer">Answerer</option>
                <option value="Evaluater">Evaluater</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Apply</button>
    </form>
</div>