var IUser = {

    wsuri: "es_dev.WS.IUser.asmx",        // You must enter the correct uri to your installed web service.
    wsenvironment: ".NET",               // Possible values are: null, ".NET", "PHP"

    /****************************************************************
        --- FUNCTION INDEX ---

        DeleteUser
        GetUser
        ListReviewByUserAndCafe
        ListUser
        ListUserByEmail
        NewUser
        SetUser
        SignupUser

    ****************************************************************/

    /*
        // This code exemplifies how to call the generated function DeleteUser
        IUser.DeleteUser(
            {"ID": your_int},
            function(args){
                // This function is called on success
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    DeleteUser: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IUser.wsuri + "/DeleteUser",
            data: IUser.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    if(context) onsuccess.call(context, args); else onsuccess(args);
                }
            },
            error: function(x, msg) {
                if (onerror){
                    if (context) onerror.call(context, x, msg, args); else onerror(x, msg, args);
                }
            },
            complete: function() {
                if (oncomplete){
                    if (context) oncomplete.call(context, args); else oncomplete(args)
                }
            }
        });
    },

    /*
        // This code exemplifies how to call the generated function GetUser
        IUser.GetUser(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Email (string), Password Hash (string_or_null), Salt Key (string_or_null), Name (string_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Email"]; 
                var yourVariable3 = result["Password Hash"]; 
                var yourVariable4 = result["Salt Key"]; 
                var yourVariable5 = result["Name"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetUser: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IUser.wsuri + "/GetUser",
            data: IUser.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IUser.JSONHelper.WSEnv()){
                        case ".NET":
                            result = response.d;
                        break;
                        case "PHP":
                            result = response;
                        break;
                        default:
                            throw new Exception("Unknown target environment");
                        break;
                    }
                    if(context) onsuccess.call(context, result, args); else onsuccess(result, args);
                }
            },
            error: function(x, msg) {
                if (onerror){
                    if (context) onerror.call(context, x, msg, args); else onerror(x, msg, args);
                }
            },
            complete: function() {
                if (oncomplete){
                    if (context) oncomplete.call(context, args); else oncomplete(args)
                }
            }
        });
    },

    /*
        // This code exemplifies how to call the generated function ListReviewByUserAndCafe
        IUser.ListReviewByUserAndCafe(
            {"maxRowsToReturn": your_int_or_null, "UserID": your_int, "CafeID": your_int},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Rating (int_or_null), Comments (text_or_null), Review Date (datetime_or_null), Review TypeID (int), UserID (int), CafeID (int), BeansID (int_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Rating"]; 
                    var yourVariable3 = results[i]["Comments"]; 
                    var yourVariable4 = results[i]["Review Date"]; 
                    var yourVariable5 = results[i]["Review TypeID"]; 
                    var yourVariable6 = results[i]["UserID"]; 
                    var yourVariable7 = results[i]["CafeID"]; 
                    var yourVariable8 = results[i]["BeansID"]; 
                }
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    ListReviewByUserAndCafe: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IUser.wsuri + "/ListReviewByUserAndCafe",
            data: IUser.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "UserID": args["UserID"], "CafeID": args["CafeID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IUser.JSONHelper.WSEnv()){
                        case ".NET":
                            results = response.d;
                        break;
                        case "PHP":
                            results = response;
                        break;
                        default:
                            throw new Exception("Unknown target environment");
                        break;
                    }
                    for (var i = 0; i< results.length; i++) {
                        results[i]["Review Date"] = IUser.JSONHelper.StringToDate(results[i]["Review Date"]);
                    }
                    if(context) onsuccess.call(context, results, args); else onsuccess(results, args);
                }
            },
            error: function(x, msg) {
                if (onerror){
                    if (context) onerror.call(context, x, msg, args); else onerror(x, msg, args);
                }
            },
            complete: function() {
                if (oncomplete){
                    if (context) oncomplete.call(context, args); else oncomplete(args)
                }
            }
        });
    },

    /*
        // This code exemplifies how to call the generated function ListUser
        IUser.ListUser(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Email (string), Password Hash (string_or_null), Salt Key (string_or_null), Name (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Email"]; 
                    var yourVariable3 = results[i]["Password Hash"]; 
                    var yourVariable4 = results[i]["Salt Key"]; 
                    var yourVariable5 = results[i]["Name"]; 
                }
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    ListUser: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IUser.wsuri + "/ListUser",
            data: IUser.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IUser.JSONHelper.WSEnv()){
                        case ".NET":
                            results = response.d;
                        break;
                        case "PHP":
                            results = response;
                        break;
                        default:
                            throw new Exception("Unknown target environment");
                        break;
                    }
                    if(context) onsuccess.call(context, results, args); else onsuccess(results, args);
                }
            },
            error: function(x, msg) {
                if (onerror){
                    if (context) onerror.call(context, x, msg, args); else onerror(x, msg, args);
                }
            },
            complete: function() {
                if (oncomplete){
                    if (context) oncomplete.call(context, args); else oncomplete(args)
                }
            }
        });
    },

    /*
        // This code exemplifies how to call the generated function ListUserByEmail
        IUser.ListUserByEmail(
            {"maxRowsToReturn": your_int_or_null, "Email": your_string},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Email (string), Password Hash (string_or_null), Salt Key (string_or_null), Name (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Email"]; 
                    var yourVariable3 = results[i]["Password Hash"]; 
                    var yourVariable4 = results[i]["Salt Key"]; 
                    var yourVariable5 = results[i]["Name"]; 
                }
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    ListUserByEmail: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IUser.wsuri + "/ListUserByEmail",
            data: IUser.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "Email": args["Email"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IUser.JSONHelper.WSEnv()){
                        case ".NET":
                            results = response.d;
                        break;
                        case "PHP":
                            results = response;
                        break;
                        default:
                            throw new Exception("Unknown target environment");
                        break;
                    }
                    if(context) onsuccess.call(context, results, args); else onsuccess(results, args);
                }
            },
            error: function(x, msg) {
                if (onerror){
                    if (context) onerror.call(context, x, msg, args); else onerror(x, msg, args);
                }
            },
            complete: function() {
                if (oncomplete){
                    if (context) oncomplete.call(context, args); else oncomplete(args)
                }
            }
        });
    },

    /*
        // This code exemplifies how to call the generated function NewUser
        IUser.NewUser(
            {"Email": your_string},
            function(result, args){
                // This function is called on success
                // result is an integer (the primary key) identifying the inserted row
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    NewUser: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IUser.wsuri + "/NewUser",
            data: IUser.JSONHelper.SerializeArgs({ "Email": args["Email"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IUser.JSONHelper.WSEnv()){
                        case ".NET":
                            if(context) onsuccess.call(context, response.d, args); else onsuccess(response.d, args);
                        break;
                        case "PHP":
                            if(context) onsuccess.call(context, response, args); else onsuccess(response, args);
                        break;
                        default:
                            throw new Exception("Unknown target environment");
                        break;
                    }
                }
            },
            error: function(x, msg) {
                if (onerror){
                    if (context) onerror.call(context, x, msg, args); else onerror(x, msg, args);
                }
            },
            complete: function() {
                if (oncomplete){
                    if (context) oncomplete.call(context, args); else oncomplete(args)
                }
            }
        });
    },

    /*
        // This code exemplifies how to call the generated function SetUser
        IUser.SetUser(
            {"ID": your_int, "Email": your_string, "Password Hash": your_string_or_null, "Salt Key": your_string_or_null, "Name": your_string_or_null},
            function(args){
                // This function is called on success
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    SetUser: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IUser.wsuri + "/SetUser",
            data: IUser.JSONHelper.SerializeArgs({ "ID": args["ID"], "Email": args["Email"], "Password Hash": (typeof(args["Password Hash"]) !== 'undefined' ? args["Password Hash"] : null), "Salt Key": (typeof(args["Salt Key"]) !== 'undefined' ? args["Salt Key"] : null), "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null)}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    if(context) onsuccess.call(context, args); else onsuccess(args);
                }
            },
            error: function(x, msg) {
                if (onerror){
                    if (context) onerror.call(context, x, msg, args); else onerror(x, msg, args);
                }
            },
            complete: function() {
                if (oncomplete){
                    if (context) oncomplete.call(context, args); else oncomplete(args)
                }
            }
        });
    },

    /*
        // This code exemplifies how to call the generated function SignupUser
        IUser.SignupUser(
            {"Email": your_string, "Password Hash": your_string_or_null, "Salt Key": your_string_or_null, "Name": your_string_or_null},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Email (string), Password Hash (string_or_null), Salt Key (string_or_null), Name (string_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Email"]; 
                var yourVariable3 = result["Password Hash"]; 
                var yourVariable4 = result["Salt Key"]; 
                var yourVariable5 = result["Name"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    SignupUser: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IUser.wsuri + "/SignupUser",
            data: IUser.JSONHelper.SerializeArgs({ "Email": args["Email"], "Password Hash": (typeof(args["Password Hash"]) !== 'undefined' ? args["Password Hash"] : null), "Salt Key": (typeof(args["Salt Key"]) !== 'undefined' ? args["Salt Key"] : null), "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null)}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IUser.JSONHelper.WSEnv()){
                        case ".NET":
                            result = response.d;
                        break;
                        case "PHP":
                            result = response;
                        break;
                        default:
                            throw new Exception("Unknown target environment");
                        break;
                    }
                    if(context) onsuccess.call(context, result, args); else onsuccess(result, args);
                }
            },
            error: function(x, msg) {
                if (onerror){
                    if (context) onerror.call(context, x, msg, args); else onerror(x, msg, args);
                }
            },
            complete: function() {
                if (oncomplete){
                    if (context) oncomplete.call(context, args); else oncomplete(args)
                }
            }
        });
    },

    JSONHelper: {
        SerializeArgs: function (args) {
            var s = [];
            if (args) for (var m in args) s[s.length] = '"' + m + '":' + (typeof(args[m]) == 'undefined' || args[m] == null ? 'null' : (typeof(args[m]) == 'string' ? '"' + args[m].replace(/\\/g,"\\\\").replace(/\"/g, "\\\"").replace(/\r/g,"\\r").replace(/\n/g,"\\n").replace(/\t/g,"\\t") + '"' : args[m].toString()));
            return '{' + s.join(',') + '}';
        },
        WSEnv: function () {
                return (IUser.wsenvironment && (IUser.wsenvironment == ".NET" || IUser.wsenvironment == "PHP") ? IUser.wsenvironment : (IUser.wsuri ? (IUser.wsuri.toLowerCase().match(".asmx$") == ".asmx" ? ".NET" : (IUser.wsuri.toLowerCase().match(".php$") == ".php" ? "PHP" : "UNKNOWN")) : "UNKNOWN"));
        },
        DateToString: function (date) {
            if(date){
                switch(IUser.JSONHelper.WSEnv()) {
                    case ".NET":
                    case "PHP": {
                        var pad = function (val) {
                            val = val.toString();
                            while (val.length < 2) val = "0" + val;
                            return val;
                        };
                        return (date ? date.getFullYear() + '-' + pad((date.getMonth()+1)) + '-' + pad(date.getDate()) + 'T' + pad(date.getHours()) + ':' + pad(date.getMinutes()) + ':' + pad(date.getSeconds()) : null);
                    }
                    default:
                        throw new Exception("Unknown target environment");
                }
            }
            return null;
        },
        StringToDate: function (datestring) {
            if(datestring){
                switch(IUser.JSONHelper.WSEnv()) {
                    case ".NET":
                        return eval('new '+ datestring.replace(/\//g,' '));
                    case "PHP": {
                        var num = function(val, fb) {
                            return (val && val!='' ? parseInt(val,10) : (fb ? fb : 0));
                        };
                        var m = datestring.match(/^\s*((\d\d\d\d)-(\d\d)-(\d\d))((\s|T)(\d\d)(:(\d\d)(:(\d\d))?)?)?\s*$/i);
                        return new Date(num(m[2]), num(m[3])-1, num(m[4]), num(m[7]), num(m[9]), num(m[11]));
                    }
                }
            }
            return null;
        }
    }
}

