var IReview = {

    wsuri: "es_dev.WS.IReview.asmx",        // You must enter the correct uri to your installed web service.
    wsenvironment: ".NET",               // Possible values are: null, ".NET", "PHP"

    /****************************************************************
        --- FUNCTION INDEX ---

        DeleteBeans
        DeleteCafe
        DeleteDevice
        DeleteEquipment
        DeleteEquipment Type
        DeleteGrower
        DeleteOrigin
        DeleteReview
        DeleteReview Equipment
        DeleteReview Type
        DeleteRoaster
        DeleteUser
        GetBeans
        GetCafe
        GetDevice
        GetEquipment
        GetEquipment Type
        GetGrower
        GetOrigin
        GetReview
        GetReview Equipment
        GetReview Type
        GetRoaster
        GetUser
        ListBeans
        ListBeansByGrower
        ListBeansByRoaster
        ListCafe
        ListCafeByGoogle Places Id
        ListCafeByReference
        ListCafesInRange
        ListDevice
        ListDeviceByUser
        ListEquipment
        ListEquipment Type
        ListEquipmentByEquipment Type
        ListEquipmentTypeByName
        ListGrower
        ListGrowerByOrigin
        ListOrigin
        ListReview
        ListReview Equipment
        ListReview EquipmentByEquipment
        ListReview EquipmentByReview
        ListReview Type
        ListReviewByBeans
        ListReviewByCafe
        ListReviewByReview Type
        ListReviewByUser
        ListReviewByUserAndCafe
        ListRoaster
        ListUser
        ListUserByEmail
        NewBeans
        NewCafe
        NewDevice
        NewEquipment
        NewEquipment Type
        NewGrower
        NewOrigin
        NewReview
        NewReview Equipment
        NewReview Type
        NewRoaster
        NewUser
        SetBeans
        SetCafe
        SetDevice
        SetEquipment
        SetEquipment Type
        SetGrower
        SetOrigin
        SetReview
        SetReview Equipment
        SetReview Type
        SetRoaster
        SetUser

    ****************************************************************/

    /*
        // This code exemplifies how to call the generated function DeleteBeans
        IReview.DeleteBeans(
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

    DeleteBeans: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteBeans",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteCafe
        IReview.DeleteCafe(
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

    DeleteCafe: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteCafe",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteDevice
        IReview.DeleteDevice(
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

    DeleteDevice: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteDevice",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteEquipment
        IReview.DeleteEquipment(
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

    DeleteEquipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteEquipment",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteEquipment_Type
        IReview.DeleteEquipment_Type(
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

    DeleteEquipment_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteEquipment_Type",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteGrower
        IReview.DeleteGrower(
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

    DeleteGrower: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteGrower",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteOrigin
        IReview.DeleteOrigin(
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

    DeleteOrigin: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteOrigin",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteReview
        IReview.DeleteReview(
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

    DeleteReview: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteReview",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteReview_Equipment
        IReview.DeleteReview_Equipment(
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

    DeleteReview_Equipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteReview_Equipment",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteReview_Type
        IReview.DeleteReview_Type(
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

    DeleteReview_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteReview_Type",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteRoaster
        IReview.DeleteRoaster(
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

    DeleteRoaster: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/DeleteRoaster",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function DeleteUser
        IReview.DeleteUser(
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
            url: IReview.wsuri + "/DeleteUser",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
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
        // This code exemplifies how to call the generated function GetBeans
        IReview.GetBeans(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Name (string_or_null), GrowerID (int_or_null), RoasterID (int_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Name"]; 
                var yourVariable3 = result["GrowerID"]; 
                var yourVariable4 = result["RoasterID"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetBeans: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetBeans",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function GetCafe
        IReview.GetCafe(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Name (string), Latitude (decimal_or_null), Longitude (decimal_or_null), Address (string_or_null), Google Places Reference (string_or_null), Google Places Id (string_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Name"]; 
                var yourVariable3 = result["Latitude"]; 
                var yourVariable4 = result["Longitude"]; 
                var yourVariable5 = result["Address"]; 
                var yourVariable6 = result["Google Places Reference"]; 
                var yourVariable7 = result["Google Places Id"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetCafe: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetCafe",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function GetDevice
        IReview.GetDevice(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Identifier (string_or_null), UserID (int)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Identifier"]; 
                var yourVariable3 = result["UserID"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetDevice: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetDevice",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function GetEquipment
        IReview.GetEquipment(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Name (string_or_null), Equipment TypeID (int)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Name"]; 
                var yourVariable3 = result["Equipment TypeID"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetEquipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetEquipment",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function GetEquipment_Type
        IReview.GetEquipment_Type(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Name (string_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Name"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetEquipment_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetEquipment_Type",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function GetGrower
        IReview.GetGrower(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Name (string_or_null), OriginID (int_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Name"]; 
                var yourVariable3 = result["OriginID"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetGrower: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetGrower",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function GetOrigin
        IReview.GetOrigin(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Name (string_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Name"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetOrigin: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetOrigin",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function GetReview
        IReview.GetReview(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Rating (int_or_null), Comments (text_or_null), Review Date (datetime_or_null), Review TypeID (int), UserID (int), CafeID (int), BeansID (int_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Rating"]; 
                var yourVariable3 = result["Comments"]; 
                var yourVariable4 = result["Review Date"]; 
                var yourVariable5 = result["Review TypeID"]; 
                var yourVariable6 = result["UserID"]; 
                var yourVariable7 = result["CafeID"]; 
                var yourVariable8 = result["BeansID"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetReview: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetReview",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
                    result["Review Date"] = IReview.JSONHelper.StringToDate(result["Review Date"]);
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
        // This code exemplifies how to call the generated function GetReview_Equipment
        IReview.GetReview_Equipment(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), ReviewID (int), EquipmentID (int), Name (string_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["ReviewID"]; 
                var yourVariable3 = result["EquipmentID"]; 
                var yourVariable4 = result["Name"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetReview_Equipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetReview_Equipment",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function GetReview_Type
        IReview.GetReview_Type(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Name (string_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Name"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetReview_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetReview_Type",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function GetRoaster
        IReview.GetRoaster(
            {"ID": your_int},
            function(result, args){
                // This function is called on success
                // result contains: ID (int), Name (string_or_null)
                // Example:
                var yourVariable1 = result["ID"]; 
                var yourVariable2 = result["Name"]; 
            },
            function(x, msg, args){
                // This function is called on error
            },
            function(args){
                // This function is called after onsuccess/onerror
            }
        );
    */

    GetRoaster: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/GetRoaster",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function GetUser
        IReview.GetUser(
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
            url: IReview.wsuri + "/GetUser",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var result = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListBeans
        IReview.ListBeans(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null), GrowerID (int_or_null), RoasterID (int_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["GrowerID"]; 
                    var yourVariable4 = results[i]["RoasterID"]; 
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

    ListBeans: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListBeans",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListBeansByGrower
        IReview.ListBeansByGrower(
            {"maxRowsToReturn": your_int_or_null, "GrowerID": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null), GrowerID (int_or_null), RoasterID (int_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["GrowerID"]; 
                    var yourVariable4 = results[i]["RoasterID"]; 
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

    ListBeansByGrower: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListBeansByGrower",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "GrowerID": (typeof(args["GrowerID"]) !== 'undefined' ? args["GrowerID"] : null)}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListBeansByRoaster
        IReview.ListBeansByRoaster(
            {"maxRowsToReturn": your_int_or_null, "RoasterID": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null), GrowerID (int_or_null), RoasterID (int_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["GrowerID"]; 
                    var yourVariable4 = results[i]["RoasterID"]; 
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

    ListBeansByRoaster: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListBeansByRoaster",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "RoasterID": (typeof(args["RoasterID"]) !== 'undefined' ? args["RoasterID"] : null)}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListCafe
        IReview.ListCafe(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string), Latitude (decimal_or_null), Longitude (decimal_or_null), Address (string_or_null), Google Places Reference (string_or_null), Google Places Id (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["Latitude"]; 
                    var yourVariable4 = results[i]["Longitude"]; 
                    var yourVariable5 = results[i]["Address"]; 
                    var yourVariable6 = results[i]["Google Places Reference"]; 
                    var yourVariable7 = results[i]["Google Places Id"]; 
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

    ListCafe: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListCafe",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListCafeByGoogle_Places_Id
        IReview.ListCafeByGoogle_Places_Id(
            {"maxRowsToReturn": your_int_or_null, "Google Places Id": your_string_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string), Latitude (decimal_or_null), Longitude (decimal_or_null), Address (string_or_null), Google Places Reference (string_or_null), Google Places Id (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["Latitude"]; 
                    var yourVariable4 = results[i]["Longitude"]; 
                    var yourVariable5 = results[i]["Address"]; 
                    var yourVariable6 = results[i]["Google Places Reference"]; 
                    var yourVariable7 = results[i]["Google Places Id"]; 
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

    ListCafeByGoogle_Places_Id: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListCafeByGoogle_Places_Id",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "Google Places Id": (typeof(args["Google Places Id"]) !== 'undefined' ? args["Google Places Id"] : null)}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListCafeByReference
        IReview.ListCafeByReference(
            {"maxRowsToReturn": your_int_or_null, "reference": your_string},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string), Latitude (decimal_or_null), Longitude (decimal_or_null), Address (string_or_null), Google Places Reference (string_or_null), Google Places Id (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["Latitude"]; 
                    var yourVariable4 = results[i]["Longitude"]; 
                    var yourVariable5 = results[i]["Address"]; 
                    var yourVariable6 = results[i]["Google Places Reference"]; 
                    var yourVariable7 = results[i]["Google Places Id"]; 
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

    ListCafeByReference: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListCafeByReference",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "reference": args["reference"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListCafesInRange
        IReview.ListCafesInRange(
            {"maxRowsToReturn": your_int_or_null, "Upper Latitude": your_decimal, "Upper Longitude": your_decimal, "Lower Latitude": your_decimal, "Lower Longitude": your_decimal},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string), Latitude (decimal_or_null), Longitude (decimal_or_null), Address (string_or_null), Google Places Reference (string_or_null), Google Places Id (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["Latitude"]; 
                    var yourVariable4 = results[i]["Longitude"]; 
                    var yourVariable5 = results[i]["Address"]; 
                    var yourVariable6 = results[i]["Google Places Reference"]; 
                    var yourVariable7 = results[i]["Google Places Id"]; 
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

    ListCafesInRange: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListCafesInRange",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "Upper Latitude": args["Upper Latitude"], "Upper Longitude": args["Upper Longitude"], "Lower Latitude": args["Lower Latitude"], "Lower Longitude": args["Lower Longitude"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListDevice
        IReview.ListDevice(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Identifier (string_or_null), UserID (int)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Identifier"]; 
                    var yourVariable3 = results[i]["UserID"]; 
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

    ListDevice: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListDevice",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListDeviceByUser
        IReview.ListDeviceByUser(
            {"maxRowsToReturn": your_int_or_null, "UserID": your_int},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Identifier (string_or_null), UserID (int)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Identifier"]; 
                    var yourVariable3 = results[i]["UserID"]; 
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

    ListDeviceByUser: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListDeviceByUser",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "UserID": args["UserID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListEquipment
        IReview.ListEquipment(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null), Equipment TypeID (int)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["Equipment TypeID"]; 
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

    ListEquipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListEquipment",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListEquipment_Type
        IReview.ListEquipment_Type(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
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

    ListEquipment_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListEquipment_Type",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListEquipmentByEquipment_Type
        IReview.ListEquipmentByEquipment_Type(
            {"maxRowsToReturn": your_int_or_null, "Equipment TypeID": your_int},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null), Equipment TypeID (int)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["Equipment TypeID"]; 
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

    ListEquipmentByEquipment_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListEquipmentByEquipment_Type",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "Equipment TypeID": args["Equipment TypeID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListEquipmentTypeByName
        IReview.ListEquipmentTypeByName(
            {"maxRowsToReturn": your_int_or_null, "name": your_string},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
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

    ListEquipmentTypeByName: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListEquipmentTypeByName",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "name": args["name"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListGrower
        IReview.ListGrower(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null), OriginID (int_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["OriginID"]; 
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

    ListGrower: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListGrower",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListGrowerByOrigin
        IReview.ListGrowerByOrigin(
            {"maxRowsToReturn": your_int_or_null, "OriginID": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null), OriginID (int_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
                    var yourVariable3 = results[i]["OriginID"]; 
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

    ListGrowerByOrigin: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListGrowerByOrigin",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "OriginID": (typeof(args["OriginID"]) !== 'undefined' ? args["OriginID"] : null)}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListOrigin
        IReview.ListOrigin(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
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

    ListOrigin: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListOrigin",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListReview
        IReview.ListReview(
            {"maxRowsToReturn": your_int_or_null},
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

    ListReview: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListReview",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
                        results[i]["Review Date"] = IReview.JSONHelper.StringToDate(results[i]["Review Date"]);
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
        // This code exemplifies how to call the generated function ListReview_Equipment
        IReview.ListReview_Equipment(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), ReviewID (int), EquipmentID (int), Name (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["ReviewID"]; 
                    var yourVariable3 = results[i]["EquipmentID"]; 
                    var yourVariable4 = results[i]["Name"]; 
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

    ListReview_Equipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListReview_Equipment",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListReview_EquipmentByEquipment
        IReview.ListReview_EquipmentByEquipment(
            {"maxRowsToReturn": your_int_or_null, "EquipmentID": your_int},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), ReviewID (int), EquipmentID (int), Name (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["ReviewID"]; 
                    var yourVariable3 = results[i]["EquipmentID"]; 
                    var yourVariable4 = results[i]["Name"]; 
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

    ListReview_EquipmentByEquipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListReview_EquipmentByEquipment",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "EquipmentID": args["EquipmentID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListReview_EquipmentByReview
        IReview.ListReview_EquipmentByReview(
            {"maxRowsToReturn": your_int_or_null, "ReviewID": your_int},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), ReviewID (int), EquipmentID (int), Name (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["ReviewID"]; 
                    var yourVariable3 = results[i]["EquipmentID"]; 
                    var yourVariable4 = results[i]["Name"]; 
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

    ListReview_EquipmentByReview: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListReview_EquipmentByReview",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "ReviewID": args["ReviewID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListReview_Type
        IReview.ListReview_Type(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
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

    ListReview_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListReview_Type",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListReviewByBeans
        IReview.ListReviewByBeans(
            {"maxRowsToReturn": your_int_or_null, "BeansID": your_int_or_null},
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

    ListReviewByBeans: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListReviewByBeans",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "BeansID": (typeof(args["BeansID"]) !== 'undefined' ? args["BeansID"] : null)}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
                        results[i]["Review Date"] = IReview.JSONHelper.StringToDate(results[i]["Review Date"]);
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
        // This code exemplifies how to call the generated function ListReviewByCafe
        IReview.ListReviewByCafe(
            {"maxRowsToReturn": your_int_or_null, "CafeID": your_int},
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

    ListReviewByCafe: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListReviewByCafe",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "CafeID": args["CafeID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
                        results[i]["Review Date"] = IReview.JSONHelper.StringToDate(results[i]["Review Date"]);
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
        // This code exemplifies how to call the generated function ListReviewByReview_Type
        IReview.ListReviewByReview_Type(
            {"maxRowsToReturn": your_int_or_null, "Review TypeID": your_int},
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

    ListReviewByReview_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListReviewByReview_Type",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "Review TypeID": args["Review TypeID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
                        results[i]["Review Date"] = IReview.JSONHelper.StringToDate(results[i]["Review Date"]);
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
        // This code exemplifies how to call the generated function ListReviewByUser
        IReview.ListReviewByUser(
            {"maxRowsToReturn": your_int_or_null, "UserID": your_int},
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

    ListReviewByUser: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListReviewByUser",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "UserID": args["UserID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
                        results[i]["Review Date"] = IReview.JSONHelper.StringToDate(results[i]["Review Date"]);
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
        // This code exemplifies how to call the generated function ListReviewByUserAndCafe
        IReview.ListReviewByUserAndCafe(
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
            url: IReview.wsuri + "/ListReviewByUserAndCafe",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "UserID": args["UserID"], "CafeID": args["CafeID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
                        results[i]["Review Date"] = IReview.JSONHelper.StringToDate(results[i]["Review Date"]);
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
        // This code exemplifies how to call the generated function ListRoaster
        IReview.ListRoaster(
            {"maxRowsToReturn": your_int_or_null},
            function(results, args){
                // This function is called on success
                // results contains: ID (int), Name (string_or_null)
                // Example:
                for (var i=0; i<results.length; i++) {
                    var yourVariable1 = results[i]["ID"]; 
                    var yourVariable2 = results[i]["Name"]; 
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

    ListRoaster: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/ListRoaster",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function ListUser
        IReview.ListUser(
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
            url: IReview.wsuri + "/ListUser",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        IReview.ListUserByEmail(
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
            url: IReview.wsuri + "/ListUserByEmail",
            data: IReview.JSONHelper.SerializeArgs({ "maxRowsToReturn": args["maxRowsToReturn"] || null, "Email": args["Email"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if (onsuccess){
                    var results = null;
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewBeans
        IReview.NewBeans(
            {},
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

    NewBeans: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewBeans",
            data: IReview.JSONHelper.SerializeArgs({ }),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewCafe
        IReview.NewCafe(
            {"Name": your_string, "Latitude": your_decimal_or_null, "Longitude": your_decimal_or_null, "Address": your_string_or_null, "Google Places Reference": your_string_or_null, "Google Places Id": your_string_or_null},
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

    NewCafe: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewCafe",
            data: IReview.JSONHelper.SerializeArgs({ "Name": args["Name"], "Latitude": (typeof(args["Latitude"]) !== 'undefined' ? args["Latitude"] : null), "Longitude": (typeof(args["Longitude"]) !== 'undefined' ? args["Longitude"] : null), "Address": (typeof(args["Address"]) !== 'undefined' ? args["Address"] : null), "Google Places Reference": (typeof(args["Google Places Reference"]) !== 'undefined' ? args["Google Places Reference"] : null), "Google Places Id": (typeof(args["Google Places Id"]) !== 'undefined' ? args["Google Places Id"] : null)}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewDevice
        IReview.NewDevice(
            {"UserID": your_int},
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

    NewDevice: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewDevice",
            data: IReview.JSONHelper.SerializeArgs({ "UserID": args["UserID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewEquipment
        IReview.NewEquipment(
            {"Equipment TypeID": your_int},
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

    NewEquipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewEquipment",
            data: IReview.JSONHelper.SerializeArgs({ "Equipment TypeID": args["Equipment TypeID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewEquipment_Type
        IReview.NewEquipment_Type(
            {},
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

    NewEquipment_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewEquipment_Type",
            data: IReview.JSONHelper.SerializeArgs({ }),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewGrower
        IReview.NewGrower(
            {},
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

    NewGrower: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewGrower",
            data: IReview.JSONHelper.SerializeArgs({ }),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewOrigin
        IReview.NewOrigin(
            {},
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

    NewOrigin: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewOrigin",
            data: IReview.JSONHelper.SerializeArgs({ }),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewReview
        IReview.NewReview(
            {"Review TypeID": your_int, "UserID": your_int, "CafeID": your_int},
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

    NewReview: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewReview",
            data: IReview.JSONHelper.SerializeArgs({ "Review TypeID": args["Review TypeID"], "UserID": args["UserID"], "CafeID": args["CafeID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewReview_Equipment
        IReview.NewReview_Equipment(
            {"ReviewID": your_int, "EquipmentID": your_int},
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

    NewReview_Equipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewReview_Equipment",
            data: IReview.JSONHelper.SerializeArgs({ "ReviewID": args["ReviewID"], "EquipmentID": args["EquipmentID"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewReview_Type
        IReview.NewReview_Type(
            {},
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

    NewReview_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewReview_Type",
            data: IReview.JSONHelper.SerializeArgs({ }),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewRoaster
        IReview.NewRoaster(
            {},
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

    NewRoaster: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/NewRoaster",
            data: IReview.JSONHelper.SerializeArgs({ }),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function NewUser
        IReview.NewUser(
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
            url: IReview.wsuri + "/NewUser",
            data: IReview.JSONHelper.SerializeArgs({ "Email": args["Email"]}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                if(onsuccess){
                    switch(IReview.JSONHelper.WSEnv()){
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
        // This code exemplifies how to call the generated function SetBeans
        IReview.SetBeans(
            {"ID": your_int, "Name": your_string_or_null, "GrowerID": your_int_or_null, "RoasterID": your_int_or_null},
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

    SetBeans: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetBeans",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null), "GrowerID": (typeof(args["GrowerID"]) !== 'undefined' ? args["GrowerID"] : null), "RoasterID": (typeof(args["RoasterID"]) !== 'undefined' ? args["RoasterID"] : null)}),
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
        // This code exemplifies how to call the generated function SetCafe
        IReview.SetCafe(
            {"ID": your_int, "Name": your_string, "Latitude": your_decimal_or_null, "Longitude": your_decimal_or_null, "Address": your_string_or_null, "Google Places Reference": your_string_or_null, "Google Places Id": your_string_or_null},
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

    SetCafe: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetCafe",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Name": args["Name"], "Latitude": (typeof(args["Latitude"]) !== 'undefined' ? args["Latitude"] : null), "Longitude": (typeof(args["Longitude"]) !== 'undefined' ? args["Longitude"] : null), "Address": (typeof(args["Address"]) !== 'undefined' ? args["Address"] : null), "Google Places Reference": (typeof(args["Google Places Reference"]) !== 'undefined' ? args["Google Places Reference"] : null), "Google Places Id": (typeof(args["Google Places Id"]) !== 'undefined' ? args["Google Places Id"] : null)}),
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
        // This code exemplifies how to call the generated function SetDevice
        IReview.SetDevice(
            {"ID": your_int, "Identifier": your_string_or_null, "UserID": your_int},
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

    SetDevice: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetDevice",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Identifier": (typeof(args["Identifier"]) !== 'undefined' ? args["Identifier"] : null), "UserID": args["UserID"]}),
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
        // This code exemplifies how to call the generated function SetEquipment
        IReview.SetEquipment(
            {"ID": your_int, "Name": your_string_or_null, "Equipment TypeID": your_int},
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

    SetEquipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetEquipment",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null), "Equipment TypeID": args["Equipment TypeID"]}),
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
        // This code exemplifies how to call the generated function SetEquipment_Type
        IReview.SetEquipment_Type(
            {"ID": your_int, "Name": your_string_or_null},
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

    SetEquipment_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetEquipment_Type",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null)}),
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
        // This code exemplifies how to call the generated function SetGrower
        IReview.SetGrower(
            {"ID": your_int, "Name": your_string_or_null, "OriginID": your_int_or_null},
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

    SetGrower: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetGrower",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null), "OriginID": (typeof(args["OriginID"]) !== 'undefined' ? args["OriginID"] : null)}),
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
        // This code exemplifies how to call the generated function SetOrigin
        IReview.SetOrigin(
            {"ID": your_int, "Name": your_string_or_null},
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

    SetOrigin: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetOrigin",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null)}),
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
        // This code exemplifies how to call the generated function SetReview
        IReview.SetReview(
            {"ID": your_int, "Rating": your_int_or_null, "Comments": your_text_or_null, "Review Date": your_datetime_or_null, "Review TypeID": your_int, "UserID": your_int, "CafeID": your_int, "BeansID": your_int_or_null},
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

    SetReview: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetReview",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Rating": (typeof(args["Rating"]) !== 'undefined' ? args["Rating"] : null), "Comments": (typeof(args["Comments"]) !== 'undefined' ? args["Comments"] : null), "Review Date": IReview.JSONHelper.DateToString((typeof(args["Review Date"]) !== 'undefined' ? args["Review Date"] : null)), "Review TypeID": args["Review TypeID"], "UserID": args["UserID"], "CafeID": args["CafeID"], "BeansID": (typeof(args["BeansID"]) !== 'undefined' ? args["BeansID"] : null)}),
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
        // This code exemplifies how to call the generated function SetReview_Equipment
        IReview.SetReview_Equipment(
            {"ID": your_int, "ReviewID": your_int, "EquipmentID": your_int, "Name": your_string_or_null},
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

    SetReview_Equipment: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetReview_Equipment",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "ReviewID": args["ReviewID"], "EquipmentID": args["EquipmentID"], "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null)}),
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
        // This code exemplifies how to call the generated function SetReview_Type
        IReview.SetReview_Type(
            {"ID": your_int, "Name": your_string_or_null},
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

    SetReview_Type: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetReview_Type",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null)}),
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
        // This code exemplifies how to call the generated function SetRoaster
        IReview.SetRoaster(
            {"ID": your_int, "Name": your_string_or_null},
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

    SetRoaster: function (args, onsuccess, onerror, oncomplete, context) {
        $.ajax({
            type: "POST",
            url: IReview.wsuri + "/SetRoaster",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null)}),
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
        // This code exemplifies how to call the generated function SetUser
        IReview.SetUser(
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
            url: IReview.wsuri + "/SetUser",
            data: IReview.JSONHelper.SerializeArgs({ "ID": args["ID"], "Email": args["Email"], "Password Hash": (typeof(args["Password Hash"]) !== 'undefined' ? args["Password Hash"] : null), "Salt Key": (typeof(args["Salt Key"]) !== 'undefined' ? args["Salt Key"] : null), "Name": (typeof(args["Name"]) !== 'undefined' ? args["Name"] : null)}),
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

    JSONHelper: {
        SerializeArgs: function (args) {
            var s = [];
            if (args) for (var m in args) s[s.length] = '"' + m + '":' + (typeof(args[m]) == 'undefined' || args[m] == null ? 'null' : (typeof(args[m]) == 'string' ? '"' + args[m].replace(/\\/g,"\\\\").replace(/\"/g, "\\\"").replace(/\r/g,"\\r").replace(/\n/g,"\\n").replace(/\t/g,"\\t") + '"' : args[m].toString()));
            return '{' + s.join(',') + '}';
        },
        WSEnv: function () {
                return (IReview.wsenvironment && (IReview.wsenvironment == ".NET" || IReview.wsenvironment == "PHP") ? IReview.wsenvironment : (IReview.wsuri ? (IReview.wsuri.toLowerCase().match(".asmx$") == ".asmx" ? ".NET" : (IReview.wsuri.toLowerCase().match(".php$") == ".php" ? "PHP" : "UNKNOWN")) : "UNKNOWN"));
        },
        DateToString: function (date) {
            if(date){
                switch(IReview.JSONHelper.WSEnv()) {
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
                switch(IReview.JSONHelper.WSEnv()) {
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

