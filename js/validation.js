const validation = new JustValidate("#signUp");

validation
    .addField("#firstname", [
        {
            rule: "required"
        }
    ])

    .addField("#lastname", [
        {
            rule: "required"
        }
    ])

    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        }
    ])

    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])

    .addField("#confirm-password", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Passwords should match"
        }
    ])

    .onSuccess((event) => {
        document.getElementById("signUp").submit();
    });