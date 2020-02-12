import { connect } from 'react-redux';

import Home from 'src/components/Home';

import { changeIndex } from 'src/store/actions';


const mapStateToProps = (state) => ({
  highways: state.home.highways,
  activeIndex: state.home.activeIndex,
});

const mapDispatchToProps = (dispatch) => ({
  changeIndexValue: (activeIndex) => {
    dispatch(changeIndex(activeIndex));
  },
});

const HomeContainer = connect(
  mapStateToProps,
  mapDispatchToProps,
)(Home);

export default HomeContainer;
