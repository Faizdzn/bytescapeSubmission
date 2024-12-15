const login = () => {
    const u = document.getElementById("username-val").value;
    const p = document.getElementById("password-val").value;

    alert(`username: ${u}, pass: ${p}`)
}

const searchKelas = () => {
    const pg = document.getElementById("kelas-page-val").getAttribute("value");
    const dd = document.getElementById("kelas-dd-val").getAttribute("value");
    const sv = document.getElementById("search_norm-val").value;
    window.location.href = `/kelas?search=${sv}&sort=${dd}&page=${pg}`;
}

const searchCourseInKelas = (id) => {
    const pg = document.getElementById("course-page-val").getAttribute("value");
    const dd = document.getElementById("course-dd-val").getAttribute("value");
    const sv = document.getElementById("search_course-val").value;
    window.location.href = `/kelas/${id}?search=${sv}&sort=${dd}&page=${pg}`;
}

const searchCourse = () => {
    const pg = document.getElementById("course-page-val").getAttribute("value");
    const dd = document.getElementById("course-dd-val").getAttribute("value");
    const sv = document.getElementById("search_course-val").value;
    window.location.href = `/course?search=${sv}&sort=${dd}&page=${pg}`;
}