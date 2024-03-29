import './style.css';
import { useDispatch, useSelector } from "react-redux";
import { Link } from "react-router-dom";
import { deleteUesrAction } from '../Config/actions';

function UserList() {
  const users = useSelector(data => data.users);

  const dispatch = useDispatch();
  const handleDelete = (id) => {
    dispatch(deleteUesrAction(id));
  };

  return (
    <div className="UserList"> 
      <p>
        <Link to="/add-user"><button className='Add'>Add user</button></Link>
      </p>
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {users.map((user, index) => (
            <tr key={index}>
              <td>{user.id}</td>
              <td>{user.name}</td>
              <td>{user.email}</td>
              <td>
                <Link to={`/update-user/${user.id}`}><button className='edit'>Edit</button></Link>
                <button onClick={() => handleDelete(user.id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default UserList;
