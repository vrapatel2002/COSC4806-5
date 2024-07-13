        <?php require_once 'app/views/templates/header.php' ?>
        <div class="container">
            <div class="page-header" id="banner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Hey, <?= $_SESSION['username']?></h2>
                        <p class="lead"> <?= date("F jS, Y"); ?></p>
                    </div>
                </div>
            </div>

            <main role="main" class="container">
            <div class="page-header" id="banner">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Reminders</h1>
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

                <h2>Total Logins by Username</h2>
                <?php
                $user = $this->model('User');
                $totalLogins = $user->getTotalLoginsByUsername();
                ?>
                <?php if (!empty($totalLogins)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Total Logins</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($totalLogins as $login): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($login['username']); ?></td>
                                    <td><?php echo htmlspecialchars($login['total_logins']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No login data available.</p>
                <?php endif; ?>

                <!-- Display reminders by user -->
                <h2>Reminders by User</h2>
                <?php
                // Correct instantiation of Reminder model
                $reminders = $this->model('Reminder');
                $remindersByUser = $reminders->getRemindersByUser();
                ?>
                <?php if (!empty($remindersByUser)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Total Reminders</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($remindersByUser as $reminderUser): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reminderUser['username']); ?></td>
                                    <td><?php echo htmlspecialchars($reminderUser['total_reminders']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No reminders found.</p>
                <?php endif; ?>

            <?php require_once 'app/views/templates/footer.php' ?>
