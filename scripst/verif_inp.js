function verif_add_form(){
    nom = document.getElementById('name').value.trim();
    id_student = document.getElementById('id_student').value.trim();
    date_hour = document.getElementById('date_hour').value.trim();
    id_teacher = document.getElementById('id_teacher').value.trim();



    var nomRegex = /^[a-zA-Z0-9_]+$/;
    if (!nomRegex.test(nom)) {
        document.getElementById('nameError').innerText = "Name can only contain letters, numbers, and underscores";
        return false;
    } else {
        document.getElementById('nameError').innerText = "";
    }

    var nbRegex = /^\d+$/;
    if (!nbRegex.test(id_student)) {
        document.getElementById('id_studentError').innerText = "id student can only contain digits";
        return false;
    } else {
        document.getElementById('id_studentError').innerText = "";
    }

    if (date_hour === "") {
        document.getElementById('date_hourError').innerText = "date hour can't be empty";
        return false;
    } else {
        document.getElementById('date_hourError').innerText = "";
    }

    if (!nbRegex.test(id_teacher)) {
        document.getElementById('id_teacherError').innerText = "id teacher can only contain digits";
        return false;
    } else {
        document.getElementById('id_teacherError').innerText = "";
    }


    

    return true;
}
