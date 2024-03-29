import './AddUser.css';
import { useState } from "react"
import { useDispatch, useSelector } from "react-redux"
import { addUesrAction } from "../Config/actions"
import { useNavigate } from "react-router-dom";

function AddUser() {
    const count = useSelector(data => data.users.length);
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const handleClick = () => {
        dispatch(addUesrAction({
            id: count + 1,
            name: name,
            email: email
        }))
        navigate('/')
    }
    return (
        <div className="AddUserWrapper">
            <form className="AddUserForm">
            <h2>Add user</h2>
                <label className="AddUserLabel">Name</label>
                <input className="AddUserInput" type="text" value={name} onChange={(e) => setName(e.target.value)} />
                <label className="AddUserLabel">Email</label>
                <input className="AddUserInput" type="email" value={email} onChange={(e) => setEmail(e.target.value)} />
                <button className="AddUserButton" onClick={handleClick}>Enregistrer</button>
            </form>
        </div>
    )
}

export default AddUser
