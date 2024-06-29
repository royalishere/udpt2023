<h2 class="my-2 ms-3">QUESTION</h2>
<div class="col-12 px-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $question ?></h5>
        </div>
    </div>
</div>

<h2 class="my-4 ms-3">LIST OF ANSWERS</h2>
<div class="col-12 px-3">
    <table class="table table-striped table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">Answer ID</th>
                <th scope="col">Answer</th>
                <th scope="col">User Name</th>
                <th scope="col">Created Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($answers as $answer) : ?>
                <tr>
                    <td><?php echo $answer['AnswerID'] ?></td>
                    <td><?php echo $answer['Answer'] ?></td>
                    <td><?php echo $answer['UserName'] ?></td>
                    <td><?php echo $answer['CreatedDate'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if (isset($_SESSION['user']['role']) && in_array($_SESSION['user']['role'], ['Answerer', 'Admin'])) : ?>
    <h2 class="my-4 ms-3">ADD ANSWER</h2>
    <div class="col-12 px-3 mb-4">
        <form action="?action=addAnswer" method="post">
            <div class="mb-3">
                <label for="new-answer" class="form-label">Answer</label>
                <textarea class="form-control" id="new-answer" name="new-answer" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="reference" class="form-label">Reference</label>
                <input type="text" class="form-control" id="reference" name="reference" required>
            </div>
            <input type="hidden" name="questionId" value="<?php echo $questionId ?>">
            <button type="submit" class="btn btn-primary">Submit Answer</button>
        </form>
    </div>
<?php endif; ?>