import { connect } from 'react-redux';

import App from 'src/components/App';

import { fetchAreasData } from 'src/store/actions';


const mapStateToProps = () => ({
});

const mapDispatchToProps = (dispatch) => ({
  fetchAreas: () => {
    const action = fetchAreasData();
    dispatch(action);
  },
});

const AppContainer = connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);

export default AppContainer;
