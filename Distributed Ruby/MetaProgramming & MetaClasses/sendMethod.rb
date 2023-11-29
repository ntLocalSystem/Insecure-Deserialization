class Klass
  def hello(*args)
    p "Hello " + args.join(' ')
  end
end
k = Klass.new
k.send :hello, "gentle", "readers"   #=> "Hello gentle readers"