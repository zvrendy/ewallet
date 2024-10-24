part of 'payment_method_bloc.dart';

sealed class PaymentMethodEvent extends Equatable {
  const PaymentMethodEvent();

  @override
  List<Object> get props => [];
}

class PaymentmethodGet extends PaymentMethodEvent {}
