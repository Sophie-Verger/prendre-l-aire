import { connect } from 'react-redux';

import Page from 'src/components/Page';


const mapStateToProps = (state) => {

  return {
    logged: state.user.logged,
  };
};

const mapDispatchToProps = () => ({
});

const PageContainer = connect(
  mapStateToProps,
  mapDispatchToProps,
)(Page);

export default PageContainer;
