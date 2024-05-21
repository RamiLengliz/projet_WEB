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
                <a href="../index.php" class="sidebar-link">
                    <i class="lni lni-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Academic Management Dropdown -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#academicManagement" aria-expanded="false" aria-controls="academicManagement">
                    <i class="lni lni-agenda"></i>
                    <span>Management</span>
                </a>
                <ul id="academicManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="../index.php?page=AC" class="sidebar-link">Class</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../index.php?page=ASU" class="sidebar-link">Subject</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../index.php?page=CE" class="sidebar-link">Events</a>
                    </li>
                </ul>
            </li>
            <!-- User Management Dropdown -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#userManagement" aria-expanded="false" aria-controls="userManagement">
                    <i class="lni lni-user"></i>
                    <span>User Management</span>
                </a>
                <ul id="userManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="../index.php?page=AT" class="sidebar-link">Add Teacher Account</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../index.php?page=AS" class="sidebar-link">Add Student Account</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../index.php?page=CT" class="sidebar-link">Check Teachers</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../index.php?page=CS" class="sidebar-link">Check Students</a>
                    </li>
                </ul>
            </li>
            <!-- Courses Management Dropdown -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#coursesManagement" aria-expanded="false" aria-controls="coursesManagement">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" fill="currentColor" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">
                        <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                    </svg>
                    <span style="padding-left:10px;">Courses</span>
                </a>
                <ul id="coursesManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="ListSubjects.php" class="sidebar-link">List Subjects</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="addSubject.php" class="sidebar-link">New Subject</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="listCours.php" class="sidebar-link">List Cours</a>
                    </li>
                </ul>

            </li>
            <!-- Examination Management Dropdown -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#examinationManagement" aria-expanded="false" aria-controls="examinationManagement">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" fill="currentColor" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">
                        <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                    </svg>
                    <span style="padding-left:10px;">Examinations</span>
                </a>
                <ul id="examinationManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="../index.php?page=CE" class="sidebar-link">Create Exam</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../index.php?page=resultat" class="sidebar-link">Resultat</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../index.php?page=resultat_update" class="sidebar-link">Update Resultat</a>
                    </li>
                </ul>

            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#reclamationManagement" aria-expanded="false" aria-controls="reclamationManagement">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" fill="currentColor" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">
                        <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                    </svg>
                    <span style="padding-left:10px;">Reclamation</span>
                </a>
                <ul id="reclamationManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="../index.php?page=CR" class="sidebar-link">Check Reclamation</a>
                    </li>
                </ul>

            </li>
            <li class="sidebar-item">
                <a href="../index.php?page=change_password" class="sidebar-link">
                    <i class="lni lni-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
            <li style="height: 180px;" ></li>
            <li class="sidebar-item">
                <a href="../../../model/gestion user/logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
