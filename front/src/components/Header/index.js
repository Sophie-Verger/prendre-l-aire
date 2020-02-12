// Import NPM
import React from 'react';
import PropTypes from 'prop-types';
import { NavLink, Link } from 'react-router-dom';
import { Navbar, Nav } from 'react-bootstrap';
import Logo from '../../assets/logo_contour.svg';


// Import local
import './header.scss';

const Header = ({ logged, disconnect }) => {
  const handleClick = () => {
    disconnect();
  };

  return (
    <>
      <Navbar id="navbar" className="navbar-dark" expand="lg">
        <Navbar.Brand as={Link} to="/" className="font-italic" title="Retour à l'acceuil">
          <img
            alt=""
            src={Logo}
            height="80"
            className="d-inline-block align-middle"
          />{' '}
          <div className="d-inline-block text-wrap align-middle text-left" id="title">&nbsp;Prendre l'aire</div>
        </Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="ml-auto">
            <NavLink
              to="/"
              exact
              className="navigation-item"
              activeClassName="navigation-item-active"
            >
              Accueil
            </NavLink>
            {!logged && (
              <>
                <NavLink
                  to="/signup"
                  className="navigation-item"
                  activeClassName="navigation-item-active"
                >
                  Inscription
                </NavLink>
                <NavLink
                  to="/signin"
                  className="navigation-item"
                  activeClassName="navigation-item-active"
                >
                  Connexion
                </NavLink>
              </>
            )}

            {logged && (
              <>
                <NavLink
                  to="/profile"
                  className="navigation-item"
                  activeClassName="navigation-item-active"
                >
                  Profil
                </NavLink>
                <NavLink
                  to="/logout"
                  className="navigation-item"
                  activeClassName="navigation-item-active"
                  onClick={handleClick}
                >
                  Déconnexion
                </NavLink>
              </>
            )}
          </Nav>
        </Navbar.Collapse>
      </Navbar>
    </>
  );
};

Header.propTypes = {
  logged: PropTypes.bool.isRequired,
  disconnect: PropTypes.func.isRequired,
};

export default Header;
