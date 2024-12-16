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

    // caretClass.forEach(data => {
    //     caret.classList.toggle(data);
    // })
    caret.classList.toggle('text-green');
    if(caret.classList.contains('caret-act')) {
        caret.classList.add('caret');
        caret.classList.remove('caret-act');
    }
    else {
        caret.classList.remove('caret');
        caret.classList.add('caret-act');
    }

    if(content.classList.contains('open-dd')) {
        content.classList.remove('open-dd');
        content.classList.add('close-dd');
    }
    else {
        content.classList.add('open-dd');
        content.classList.remove('close-dd');
    }
}

const inputAct = (id) => {
    const val = document.getElementById(`${id}-val`).value;
    const span = document.getElementById(`${id}-label`);

    if(val.length > 0) {
        span.classList.add("label-act");
        span.classList.remove("label");
    } else {
        span.classList.remove("label-act");
        span.classList.add("label");
    }
}

const openDD = (id) => {
    const caret = document.getElementById(`${id}-caret`);
    const content = document.getElementById(`${id}-content`);

    if(caret.classList.contains('caret-act')) {
        caret.classList.add('caret');
        caret.classList.remove('caret-act');
    }
    else {
        caret.classList.remove('caret');
        caret.classList.add('caret-act');
    }

    if(content.classList.contains('open-dd')) {
        content.classList.add('close-dd');
        content.classList.remove('open-dd');
    }
    else {
        content.classList.remove('close-dd');
        content.classList.add('open-dd');
    }
}

const activeDD = (id, value, url = "") => {
    const dd = document.getElementById(`${id}-val`);
    const checked = dd.getAttribute('value');
    
    const ph = document.getElementById(`${id}-ph`);

    const item_prev = document.getElementById(`${id}-item-${checked}`);
    const check_prev = document.getElementById(`${id}-check-${checked}`);
    
    const slot = document.getElementById(`${id}-slot-${value}`);
    const item = document.getElementById(`${id}-item-${value}`);
    const check = document.getElementById(`${id}-check-${value}`);

    ph.innerHTML = slot.innerHTML ;

    if(checked.length < 1) {
        dd.setAttribute('value', value);

        if(item.classList.contains('item-dd')) {
            item.classList.add('checked-item-dd');
            item.classList.remove('item-dd');
        }
        else {
            item.classList.remove('checked-item-dd');
            item.classList.add('item-dd');
        }
    
        check.classList.toggle('text-transparent');
    }
    else if(checked != value || checked.length < 1) {
        dd.setAttribute('value', value);

        if(item_prev.classList.contains('item-dd')) {
            item_prev.classList.add('checked-item-dd');
            item_prev.classList.remove('item-dd');
        }
        else {
            item_prev.classList.remove('checked-item-dd');
            item_prev.classList.add('item-dd');
        }
    
        check_prev.classList.toggle('text-transparent');
        
        if(item.classList.contains('item-dd')) {
            item.classList.add('checked-item-dd');
            item.classList.remove('item-dd');
        }
        else {
            item.classList.remove('checked-item-dd');
            item.classList.add('item-dd');
        }
    
        check.classList.toggle('text-transparent');
    }

    if(url.length > 0) {
        window.location.href = url
    }
}

const addStar = (id, val, fn) => {
    const rv = document.getElementById(`${id}-val`);
    const lab = document.getElementById(`${id}-label`);
    
    for(let i = 1; i <= rv.getAttribute('value'); i++) {
        const sv = document.getElementById(`${id}-star-${i}`);
        sv.classList.contains('text-gold') ? sv.classList.remove('text-gold') : '';
    }

    rv.setAttribute('value', val);
    lab.textContent = "Rating Anda";
    for(let i = 1; i <= val; i++) {
        const sv = document.getElementById(`${id}-star-${i}`);
        sv.classList.add('text-gold');
    }

    if(fn) {
        fn();
    }
}

const btnHref = (url) => {
    window.location.href = url
}

const shareUrl = async(url) => {
    const sdt = {
        title: "EduPoint",
        text: "EduPoint | Tempat Kumpul Belajarmu\n",
        url,
    };

    try {
        await navigator.clipboard.writeText(`${window.location.host}${url}`);
        await navigator.share(sdt);
    } catch(e) {
        console.error(e);
    }
}

const toast = (icon, message) => {
    const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1550,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        });
    
    if(icon == 'success') {
      Toast.fire({
                icon: 'success',
                iconColor: 'white',
                title: message,
                color: "white",
                background: "#07ab02",
              });
    } else if (icon == 'error') {
      Toast.fire({
                icon: 'error',
                iconColor: 'white',
                title: message,
                color: "white",
                background: "#ab0502",
              });
    } else {
      Toast.fire({
            timer: 10000,
            timerProgressBar: true,
            icon: "warning",
            iconColor: "white",
            title: message,
            color: "white",
            background: "#4287f5",
          });
    }
}