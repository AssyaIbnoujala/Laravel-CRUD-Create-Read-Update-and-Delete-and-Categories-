import './App.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import AddUser from './Composants/AddUser';
import UpdateUser from './Composants/UpdateUser'; // Corrected import
import UserList from './Composants/UserList';

function App() {
  return (
    <div >
      <h1>CRUD REACT REDUX </h1>
      <BrowserRouter>
        <Routes>
          <Route path='/' element={<UserList/>}/>
          <Route path='/add-user' element={<AddUser/>}/>
          <Route path='/update-user/:id' element={<UpdateUser/>}/> {/* Corrected component name */}
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
