const login = async () => {
    const u = document.getElementById("username-val").value;
    const p = document.getElementById("password-val").value;
    
    const url = '/api/login'
    const dt = {
        u,
        p
    }

    try {
        const {data} = await axios.post(url, dt);

        toast('success', data.msg);
        setTimeout(() => {
            window.location.href = '/my/dashboard'
        }, 2500)
    } catch(e) {
        toast('error', e.response.data.err['msg'])
    }
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

const changePass = () => {
    const op = document.getElementById('oldPass-cp-val').value;
    const np = document.getElementById('newPass-cp').value;

    console.log(op);
}

const changeUsername = () => {
    const u = document.getElementById('username-cu-val').value;
    const p = document.getElementById('password-cu-val').value;

    console.log(u);
}