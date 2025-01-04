<!DOCTYPE html>
<html lang="en">

@include('./pm/header')

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Project Management</h1>
        @include('./pm/userSite/content', [$projectUsers, $projects, $tasks])
    </div>
</body>

</html>
