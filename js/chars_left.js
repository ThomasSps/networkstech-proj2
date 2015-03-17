function textCount(textfield,leftfield,charlimit) 
{
    if (textfield.value.length > charlimit)
            textfield.value = textfield.value.substring(0, charlimit);

    else
        leftfield.value = charlimit - textfield.value.length;
}
