<p>
	Hi {{ $userName }}
</p>
<p>	
these are your lucky numbers: {{ LuckyNumbersHelper::format_lucky_numbers($numbers)}}
</p>