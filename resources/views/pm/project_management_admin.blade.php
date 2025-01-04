<!DOCTYPE html>
<html lang="en">

@include('./pm/header')

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Project Management</h1>
        @include('./pm/adminSite/user-settings', [$users])
        @include('./pm/adminSite/project-settings', [$projectUsers, $users, $projects])
        @include('./pm/adminSite/task-settings', [$projectUsers, $users, $projects, $tasks])
        @include('./pm/adminSite/content', [$projectUsers, $users, $projects, $tasks])
    </div>
</body>

</html>
