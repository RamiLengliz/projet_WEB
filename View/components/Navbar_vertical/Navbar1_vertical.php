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
            <a href="index.php" class="sidebar-link " style="text-decoration:none !important;">
                <i class="lni lni-dashboard"></i>
                <span >Dashboard</span>
            </a>
        </li>
        <!-- Academic Management Dropdown -->
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" style="text-decoration:none !important;" data-bs-toggle="collapse" data-bs-target="#academicManagement" aria-expanded="false" aria-controls="academicManagement">
                <i class="lni lni-agenda"></i>
                <span>Management</span>
            </a>
            <ul id="academicManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="index.php?page=AC" class="sidebar-link">Class</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?page=ASU" class="sidebar-link">Subject</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?page=CE" class="sidebar-link">Events</a>
                </li>
            </ul>
        </li>
        <!-- User Management Dropdown -->
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" style="text-decoration:none !important;" data-bs-toggle="collapse" data-bs-target="#userManagement" aria-expanded="false" aria-controls="userManagement">
                <i class="lni lni-user"></i>
                <span>User Management</span>
            </a>
            <ul id="userManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="index.php?page=AT" class="sidebar-link">Add Teacher Account</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?page=AS" class="sidebar-link">Add Student Account</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?page=CT" class="sidebar-link">Check Teachers</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?page=CS" class="sidebar-link">Check Students</a>
                </li>
            </ul>
        </li>

        <!-- Courses Management Dropdown -->
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" style="text-decoration:none !important;" data-bs-toggle="collapse" data-bs-target="#coursesManagement" aria-expanded="false" aria-controls="coursesManagement">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" fill="currentColor" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">
                    <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                </svg>
                <span style="padding-left:10px;">Courses</span>
            </a>
            <ul id="coursesManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="gestion cours/ListSubjects.php" class="sidebar-link">List Subjects</a>
                </li>
                <li class="sidebar-item">
                    <a href="gestion cours/addSubject.php" class="sidebar-link">New Subject</a>
                </li>
            </ul>

        </li>
        <!-- Absence Management Dropdown -->
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" style="text-decoration:none !important;" data-bs-toggle="collapse" data-bs-target="#AbsenceManagement" aria-expanded="false" aria-controls="AbsenceManagement">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                </svg>
                <span style="padding-left:10px;">Attendance</span>
            </a>
            <ul id="AbsenceManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="index.php?page=AA" class="sidebar-link">Add absence</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?page=AB" class="sidebar-link">Billet</a>
                </li>

            </ul>

        </li>
        <!-- Examination Management Dropdown -->
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" style="text-decoration:none !important;" data-bs-toggle="collapse" data-bs-target="#examinationManagement" aria-expanded="false" aria-controls="examinationManagement">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-highlighter" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.096.644a2 2 0 0 1 2.791.036l1.433 1.433a2 2 0 0 1 .035 2.791l-.413.435-8.07 8.995a.5.5 0 0 1-.372.166h-3a.5.5 0 0 1-.234-.058l-.412.412A.5.5 0 0 1 2.5 15h-2a.5.5 0 0 1-.354-.854l1.412-1.412A.5.5 0 0 1 1.5 12.5v-3a.5.5 0 0 1 .166-.372l8.995-8.07zm-.115 1.47L2.727 9.52l3.753 3.753 7.406-8.254zm3.585 2.17.064-.068a1 1 0 0 0-.017-1.396L13.18 1.387a1 1 0 0 0-1.396-.018l-.068.065zM5.293 13.5 2.5 10.707v1.586L3.707 13.5z" />
                </svg>
                <span style="padding-left:10px;">Examinations</span>
            </a>
            <ul id="examinationManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="index.php?page=CE" class="sidebar-link">Create Exam</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?page=resultat" class="sidebar-link">Resultat</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?page=resultat_update" class="sidebar-link">Update Resultat</a>
                </li>
            </ul>

        </li>

        <!-- Events Management Dropdown -->
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" style="text-decoration:none !important;" data-bs-toggle="collapse" data-bs-target="#EventsManagement" aria-expanded="false" aria-controls="EventsManagement">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-event" viewBox="0 0 16 16">
                    <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
                </svg>
                <span style="padding-left:10px;">Events</span>
            </a>
            <ul id="EventsManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="index.php?page=EC" class="sidebar-link">Create Events</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?page=ER" class="sidebar-link">Reservations</a>
                </li>
            </ul>

        </li>

        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" style="text-decoration:none !important;" data-bs-toggle="collapse" data-bs-target="#reclamationManagement" aria-expanded="false" aria-controls="reclamationManagement">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21 21 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21 21 0 0 0 14 7.655V1.222z" />
                </svg>
                <span style="padding-left:10px;">Reclamation</span>
            </a>
            <ul id="reclamationManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="index.php?page=CR" class="sidebar-link">Check Reclamation</a>
                </li>
            </ul>

        </li>
        <li class="sidebar-item">
            <a href="index.php?page=change_password" class="sidebar-link" style="text-decoration:none !important;">
                <i class="lni lni-cog"></i>
                <span>Setting</span>
            </a>
        </li>
        <li style="height: 180px;"></li>
        <li class="sidebar-item">
            <a href="../../model/gestion user/logout.php" class="sidebar-link" style="text-decoration:none !important;">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>