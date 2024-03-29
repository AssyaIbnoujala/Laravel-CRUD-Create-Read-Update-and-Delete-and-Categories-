export const addUesrAction=(user)=>{
    return{type:"Add_user",payload:user}
}
export const updateUesrAction=(newuser)=>{
    return{type:"Update_user",payload:newuser}
}
export const deleteUesrAction=(id)=>{
    return{type:"Delete_user",payload:id}
}