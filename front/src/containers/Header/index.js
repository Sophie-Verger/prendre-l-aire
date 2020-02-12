import { connect } from 'react-redux';

import Header from 'src/components/Header';

import { logoutUser } from 'src/store/actions';


const mapStateToProps = (state) => ({
  logged: state.user.logged,
});

const mapDispatchToProps = (dispatch) => ({
  disconnect: () => {
    dispatch(logoutUser());
  },
});

const HeaderContainer = connect(
  mapStateToProps,
  mapDispatchToProps,
)(Header);

export default HeaderContainer;
