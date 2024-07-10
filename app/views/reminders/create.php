 <?php require_once 'app/views/templates/header.php'?>

<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Create Reminders</h1>
            </div>
        </div>
    </div>
    
    <form action="/reminders/newReminder" method="post" >
    <fieldset>
        <div class="form-group">
            <label for="username">Subject</label>
            <input required type="text" class="form-control" name="subject">
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
            
    <?php require_once 'app/views/templates/footer.php' ?>