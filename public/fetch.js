async function post(link, reload=false) {
    let res = await fetch(link);
    if(res.ok){
        if(await res.text() === '1'){
            console.log('success');
            if(reload){
                window.location.reload();
            }
        } else {
            alert('error');
        }
    } else {
        alert('req error');
    }
}