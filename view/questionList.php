<?php
$questionsPerPage = 3; // Number of questions per page

// Get the current page number from the query string, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the total number of pages
$totalQuestions = count($questions);
$totalPages = ceil($totalQuestions / $questionsPerPage);

// Calculate the offset for the SQL query
$offset = ($page - 1) * $questionsPerPage;

// Retrieve the subset of questions for the current page
$currentQuestions = array_slice($questions, $offset, $questionsPerPage);
?>

<h2 class="my-4 text-center">LIST OF QUESTIONS</h2>
<div class="col-12 px-3">
    <table class="table table-striped table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">Question ID</th>
                <th scope="col">Question</th>
                <th scope="col">User Name</th>
                <th scope="col">Tags</th>
                <th scope="col">Created Date</th>
                <th scope="col">Number of Answerers</th>
                <th scope="col">View answers</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($currentQuestions as $question) : ?>
                <tr>
                    <td><?php echo $question['QuestionID'] ?></td>
                    <td><?php echo $question['Question'] ?></td>
                    <td><?php echo $question['UserName'] ?></td>
                    <td><?php echo $question['Tags'] ?></td>
                    <td><?php echo $question['CreatedDate'] ?></td>
                    <td><?php echo $question['NumberAnswerers'] ?></td>
                    <td><a href="?action=list&type=answer&questionId=<?php echo $question['QuestionID'] ?>">View answers</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php if ($page > 1) : ?>
            <li class="page-item">
                <a class="page-link" href="?action=list&type=question&page=<?php echo $page - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <li class="page-item <?php echo ($i === $page) ? 'active' : ''; ?>">
                <a class="page-link" href=".?action=list&type=question&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($page < $totalPages) : ?>
            <li class="page-item">
                <a class="page-link" href="?action=list&type=question&page=<?php echo $page + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>