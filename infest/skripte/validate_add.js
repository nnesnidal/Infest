
    function validate() {
        var main = document.getElementById('main').value;
        //var name = document.add_character.name.value;
        var c_class = document.getElementById('addchar_odabrani_class').innerHTML;
        var c_ms = document.getElementById('addchar_odabrani_ms').innerHTML;
        var c_os = document.getElementById('addchar_odabrani_os').innerHTML;
        document.getElementById('main_error').innerHTML = '';
        //document.getElementById('name_error').innerHTML = '';
        document.getElementById('class_error').innerHTML = '';
        document.getElementById('ms_error').innerHTML = '';
        document.getElementById('os_error').innerHTML = '';
        var error = false;        

        if (main == '') {
            document.getElementById('main_error').innerHTML = 'Required field';
           error = true;
        }
        if (document.getElementById('name_error').innerHTML) {
            error = true;
        }
        if (!c_class) {
            document.getElementById('class_error').innerHTML = 'Required input';
           error = true;
        }
        if (!c_ms) {
            document.getElementById('ms_error').innerHTML = 'Required input';
           error = true;
        }
        if (c_os == c_ms && c_ms) {
            document.getElementById('os_error').innerHTML = 'Required different input from MS';
           error = true;
        }
        if (error){
            return false;
        }
        return( true );
    }

    function resetValidation() {
        document.getElementById('main_error').innerHTML = '';
        document.getElementById('name_error').innerHTML = '';
        document.getElementById('class_error').innerHTML = '';
        document.getElementById('ms_error').innerHTML = '';
        document.getElementById('os_error').innerHTML = '';
        return( true );
    }