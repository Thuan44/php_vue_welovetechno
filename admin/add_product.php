<?php include_once 'header_admin.php' ?>

<h1 class="rounded border p-2 m-4 text-center text-white bg-dark">Add a product</h1>

<div class="container">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <fieldset>
            <legend class="text-center">Which product will you add ?</legend>
            <div class="form-group">
                <select class="custom-select">
                    <option selected="">Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>

</div>

<?php include_once 'footer_admin.php' ?>