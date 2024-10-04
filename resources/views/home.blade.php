<?xml version="1.0" encoding="UTF-8"?>
<rss
	xmlns:wsj="https://ticker.prov1022.com"
	xmlns:dj="https://ticker.prov1022.com"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
	<channel>
		<title>Pepperstone Symbols Ticker</title>
		<link>http://online.wsj.com</link>
		<atom:link type="application/rss+xml" rel="self" href="https://ticker.prov1022.com"/>
		<description>Pepperstone Symbols Ticker</description>
		<language>en-us</language>
		<pubDate>{{ $now }}</pubDate>
		<lastBuildDate>{{ $now }}</lastBuildDate>
		<copyright>Pepperstone Markets Limited</copyright>
		<generator>https://ticker.prov1022.com</generator>
		<docs>http://cyber.law.harvard.edu/rss/rss.html</docs>
		<image>
			<title>Pepperstone Symbols Ticker</title>
			<link>https://ticker.prov1022.com</link>
			<url>https://ticker.prov1022.com</url>
		</image>
		@foreach ($data as $row)
		<item>
			<title>{{ $row['title'] }}</title>
			<link>{{ $row['link'] }}</link>
			<description>
				<![CDATA[{{ $row['description'] }}]]>
			</description>
			<content:encoded/>
			<pubDate>{{ $row['date'] }}</pubDate>
			<category domain="AccessClassName">{{ $title }}</category>
			<guid isPermaLink="false">PS-PRV-0000000</guid>
			<wsj:articletype>Foreign Exchange</wsj:articletype>
		</item>
		@endforeach
	</channel>
</rss>
