part of 'topup_bloc.dart';

sealed class TopupEvent extends Equatable {
  const TopupEvent();

  @override
  List<Object> get props => [];
}

class TopupPost extends TopupEvent {
  final TopupFormModel data;
  const TopupPost(this.data);

  @override
  // TODO: implement props
  List<Object> get props => [data];
}
