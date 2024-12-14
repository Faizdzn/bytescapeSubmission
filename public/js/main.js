const searchBar = (id) => {
    const sv = document.getElementById(`search-${id}`).value;
    const sq = document.getElementById(`searchQuery-${id}`);
    const se = document.querySelectorAll(`#searchVal-${id}`);

    const sk = document.getElementById(`searchKelas-${id}`);
    const sc = document.getElementById(`searchCourse-${id}`);

    se.forEach(d => {
        d.textContent = sv
    })

    sk.href = `/kelas?search=${sv}`;
    sc.href = `/course?search=${sv}`;

    if(sv.length > 0) {
        sq.classList.remove("hidden");
        sq.classList.add("block");
    } else {
        sq.classList.add("hidden");
        sq.classList.remove("block");
    }
}

const openNav = () => {
    const nc = document.getElementById("navContent");
    if(nc.classList.contains('open-nav')) {
        nc.classList.remove('open-nav');
        nc.classList.add('close-nav');
    } else {
        nc.classList.add('open-nav');
        nc.classList.remove('close-nav');
    }
}

const openSb = () => {
    const nc = document.getElementById("sbContent");
    if(nc.classList.contains('open-side')) {
        nc.classList.remove('open-side');
        nc.classList.add('close-side');
    } else {
        nc.classList.add('open-side');
        nc.classList.remove('close-side');
    }
}

const profileDD = () => {
    const pp = document.getElementById("profPP");
    const caret = document.getElementById("caret");
    const content = document.getElementById("profDD");

    const openClass = [
        'opacity-100',
        'max-h-[250px]',
    ]
    const closeClass = [
        'opacity-0',
        'max-h-0',
    ]

    const caretClass = [
        "text-green",
        "-rotate-180"
    ]

    if(pp.classList.contains('border-transparent')) {
        pp.classList.add("border-green");
        pp.classList.remove("border-transparent");
    }
    else {
        pp.classList.remove("border-green");
        pp.classList.add("border-transparent");
    }

    caretClass.forEach(data => {
        caret.classList.toggle(data);
    })

    openClass.forEach((data, index) => {
        if(content.classList.contains(data)) {
            content.classList.remove(data);
            content.classList.add(closeClass[index]);
        }
        else {
            content.classList.add(data);
            content.classList.remove(closeClass[index]);
        }
    })
}

const inputAct = (id) => {
    const val = document.getElementById(`${id}-val`).value;
    const span = document.getElementById(`${id}-label`)

    if(val.length > 0) {
        span.classList.add("label-act");
        span.classList.remove("label");
    } else {
        span.classList.remove("label-act");
        span.classList.add("label");
    }
}