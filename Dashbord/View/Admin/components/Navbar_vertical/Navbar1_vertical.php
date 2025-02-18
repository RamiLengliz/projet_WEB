<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <a href="#">ProSchool</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="index.php" class="sidebar-link">
                    <i class="lni lni-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Class</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Classroom</span>
                </a>
            </li>
        <!--    <li class="sidebar-item">
                <a href="index.php?page=ASU" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Subject</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="index.php?page=SList" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Subject List</span>
                </a>
            </li>-->
       
                
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="lni lni-protection"></i>
                    <span>Subjects</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                    <a href="addSubject.php" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Add Subject</span>
                </a>
                    </li>
                    <li class="sidebar-item">
                    <a href="ListSubjects.php" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Subject List</span>
                </a>
                    </li>
                </ul>
            </li>



            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="lni lni-protection"></i>
                    <span>Courses</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="addCourses.php" class="sidebar-link">Add Course</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="listCours.php" class="sidebar-link">List Cours</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                    <i class="lni lni-layout"></i>
                    <span>Teacher</span>
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            Add Teacher account
                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            Check teachers
                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            Teacher Management
                        </a>

                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                    <i class="lni lni-layout"></i>
                    <span>Student</span>
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            Add Student account
                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            Check Students
                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            Delete Students
                        </a>

                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-cog"></i>
                    <span>Timetable</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                    <i class="lni lni-layout"></i>
                    <span>Attendance</span>
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            Add Attendance
                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            Teacher attendance History
                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            Student attendance history
                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            Billet
                        </a>

                    </li>

                </ul>
            </li>
            
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-cog"></i>
                    <span>Events</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="#" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>