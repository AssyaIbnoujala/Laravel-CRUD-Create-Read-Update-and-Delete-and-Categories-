import './UpdateUser.css';
import { useParams } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { updateUesrAction } from "../Config/actions";
import { useNavigate } from "react-router-dom";
import { useState } from "react";

function UpdateUser() {
    const { id } = useParams();
    const user = useSelector(data => data.users.find(u => u.id === parseInt(id)));
    const [name, setName] = useState(user.name);
    const [email, setEmail] = useState(user.email);
    const dispatch = useDispatch();
    const navigate = useNavigate();

    const handleClick = () => {
        dispatch(updateUesrAction({
            id: id,
            name: name,
            email: email
        }));
        navigate('/');
    };

    return (
        <div className="UpdateUserContainer">
            <h2 className="UpdateUserTitle">Update user</h2>
            <form className="UpdateUserForm">
                <label className="UpdateUserLabel">Name</label>
                <input className="UpdateUserInput" type="text" value={name} onChange={(e) => setName(e.target.value)} />
                <label className="UpdateUserLabel">Email</label>
                <input className="UpdateUserInput" type="email" value={email} onChange={(e) => setEmail(e.target.value)} />
                <button className="UpdateUserButton" onClick={handleClick}>Enregistrer</button>
            </form>
        </div>
    );
}

export default UpdateUser;
