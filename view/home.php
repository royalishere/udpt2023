<div class="container mt-5">
    <div class="row">
        <?php if (isset($_SESSION['user']['role']) && in_array($_SESSION['user']['role'], ['Questioner', 'Admin'])) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="db-card card text-white bg-primary h-100">
                    <div class="card-body">
                        <div class="card-title">
                            <i class="fas fa-question-circle fa-2x"></i>
                            <h5 class="d-inline-block ms-3"> Đặt câu hỏi</h5>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="text-white stretched-link">Go to Đặt câu hỏi</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="db-card card text-white bg-success h-100">
                <div class="card-body">
                    <div class="card-title">
                        <i class="fas fa-list fa-2x"></i>
                        <h5 class="d-inline-block ms-3"> DS câu hỏi</h5>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="?action=list&type=question" class="text-white stretched-link">Go to DS câu hỏi</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="db-card card text-white bg-info h-100">
                <div class="card-body">
                    <div class="card-title">
                        <i class="fas fa-reply fa-2x"></i>
                        <h5 class="d-inline-block ms-3"> DS trả lời mới nhất</h5>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="text-white stretched-link">Go to DS trả lời mới nhất</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="db-card card text-white bg-warning h-100">
                <div class="card-body">
                    <div class="card-title">
                        <i class="fas fa-star fa-2x"></i>
                        <h5 class="d-inline-block ms-3"> DS đánh giá mới nhất</h5>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="text-white stretched-link">Go to DS đánh giá mới nhất</a>
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] != 'Viewer') : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="db-card card text-white bg-danger h-100">
                    <div class="card-body">
                        <div class="card-title">
                            <i class="fas fa-user-tag fa-2x"></i>
                            <h5 class="d-inline-block ms-3">Đổi vai trò</h5>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="?action=changeRole" class="text-white stretched-link">Go to Đổi vai trò</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>