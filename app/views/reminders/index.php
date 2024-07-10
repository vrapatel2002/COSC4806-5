<?php require_once 'app/views/templates/header.php'?>

<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminders</h1>
                <p> <a href="/reminders/create"> Create a new Reminder</a></p>
            </div>
        </div>
    </div>
    <?php if (!empty($data['reminders'])): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['reminders'] as $reminder): ?>
                    <tr>
                        <form action="/reminders/update/<?php echo htmlspecialchars($reminder['id']); ?>" method="post">
                            <td><?php echo htmlspecialchars($reminder['id']); ?></td>
                            <td>
                                <input required type="text" class="form-control" name="subject" value="<?php echo htmlspecialchars($reminder['subject']); ?>">
                            </td>
                            <td><?php echo htmlspecialchars($reminder['created_at']); ?></td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                                <a href="/reminders/delete/<?php echo htmlspecialchars($reminder['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this reminder?');">Delete</a>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No reminders found.</p>
    <?php endif; ?>
<?php require_once 'app/views/templates/footer.php' ?>