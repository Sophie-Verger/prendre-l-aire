import { connect } from 'react-redux';

import Team from 'src/components/Team';


const mapStateToProps = () => ({
});

const mapDispatchToProps = () => ({
});

const TeamContainer = connect(
  mapStateToProps,
  mapDispatchToProps,
)(Team);

export default TeamContainer;