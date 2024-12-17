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
            window.location.href = `/my/dashboard?access=${data.data['token']}`
        }, 1000)
    } catch(e) {
        toast('error', e.response.data.err['msg'])
    }
}

const register = async () => {
    const u = document.getElementById("username-val").value;
    const p = document.getElementById("password-val").value;
    const cp = document.getElementById("con-password-val").value;
    
    const url = '/api/register'
    const dt = {
        u,
        p,
        cp
    }

    try {
        const {data} = await axios.post(url, dt);

        toast('success', data.msg);
        setTimeout(() => {
            window.location.href = `/my/dashboard?access=${data.data['token']}`
        }, 1000)
    } catch(e) {
        toast('error', e.response.data.err['msg'])
    }
}

const searchKelas = () => {
    // const pg = document.getElementById("kelas-page-val").getAttribute("value");
    const dd = document.getElementById("kelas-dd-val").getAttribute("value");
    const sv = document.getElementById("search_norm-val").value;
    window.location.href = `/kelas?search=${sv}&sort=${dd}&page=1`;
}

const searchCourseInKelas = (id) => {
    // const pg = document.getElementById("course-page-val").getAttribute("value");
    const dd = document.getElementById("course-dd-val").getAttribute("value");
    const sv = document.getElementById("search_course-val").value;
    window.location.href = `/kelas/${id}?search=${sv}&sort=${dd}&page=1`;
}

const searchCourse = () => {
    // const pg = document.getElementById("course-page-val").getAttribute("value");
    const dd = document.getElementById("course-dd-val").getAttribute("value");
    const sv = document.getElementById("search_course-val").value;
    window.location.href = `/course?search=${sv}&sort=${dd}&page=1`;
}

const changePass = async(cookie) => {
    const op = document.getElementById('oldPass-cp-val').value;
    const np = document.getElementById('newPass-cp-val').value;

    const url = '/api/my/change-pass'
    const dt = {
        op,
        np,
        cookie
    }

    try {
        const {data} = await axios.put(url, dt);

        toast('success', data.msg);
        setTimeout(() => {
            window.location.href = `/my/settings`
        }, 1000)
    } catch(e) {
        toast('error', e.response.data.err['msg'])
    }
}

const changeUsername = async (cookie) => {
    const u = document.getElementById('username-cu-val').value;
    const p = document.getElementById('password-cu-val').value;

    const url = '/api/my/change-username'
    const dt = {
        u,
        p,
        cookie
    }

    try {
        const {data} = await axios.put(url, dt);

        toast('success', data.msg);
        setTimeout(() => {
            window.location.href = `/my/settings`
        }, 1000)
    } catch(e) {
        toast('error', e.response.data.err['msg'])
    }
}

const joinClass = async (id, cookie) => {
    const url = `/api/kelas/${id}`
    const dt = {
        cookie
    }

    try {
        const {data} = await axios.post(url, dt);

        toast('success', data.msg);
        setTimeout(() => {
            window.location.href = `/kelas/${id}`
        }, 1000)
    } catch(e) {
        toast('error', e.response.data.err['msg'])
    }
}

const leaveClass = async (id, cookie) => {
    const url = `/api/kelas/${id}`
    const dt = {
        cookie
    }

    try {
        const {data} = await axios.delete(url, {
            data: dt
        });

        toast('success', data.msg);
        setTimeout(() => {
            window.location.href = `/kelas/${id}`
        }, 1000)
    } catch(e) {
        toast('error', e.response.data.err['msg'])
    }
}
const rateCourse = async(id, cookie) => {
    const star = document.getElementById("rate-course-val").getAttribute('value');
    const url = `/api/course/${id}/rate`
    const dt = {
        cookie,
        star
    }

    try {
        const {data} = await axios.put(url, dt);
    } catch(e) {
        toast('error', e.response.data.err['msg'])
    }
}